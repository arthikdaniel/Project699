package com.repo;



import com.dto.AttendanceSummary;
import com.model.Attendance;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.mongodb.core.MongoTemplate;
import org.springframework.data.mongodb.core.aggregation.Aggregation;
import org.springframework.data.mongodb.core.aggregation.GroupOperation;
import org.springframework.data.mongodb.core.aggregation.MatchOperation;
import org.springframework.data.mongodb.core.aggregation.ProjectionOperation;
import org.springframework.data.mongodb.core.query.Criteria;
import org.springframework.data.repository.query.Param;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.data.rest.core.annotation.RestResource;
import org.springframework.web.bind.annotation.*;

import java.util.List;

import static org.springframework.data.mongodb.core.aggregation.Aggregation.*;
import static org.springframework.data.mongodb.core.query.Criteria.where;


@RestController
public class AttendanceRepositoryImpl implements AttendanceRepositoryCustom {

    private final MongoTemplate mongoTemplate;

    @Autowired
    public AttendanceRepositoryImpl(MongoTemplate mongoTemplate) {
        this.mongoTemplate = mongoTemplate;
    }

    @Override
    @RequestMapping(value = "api/widget/StudAttendWidget/{studentId}",  method = RequestMethod.GET)
    public List<AttendanceSummary> getSummaryAggregateByStudentId(
            @PathVariable("studentId") String studentId) {
        MatchOperation matchOperation = getMatchOperation(studentId);
        GroupOperation groupOperation = getGroupOperation();
        ProjectionOperation projectionOperation = getProjectOperation();

        return mongoTemplate.aggregate(Aggregation.newAggregation(
                matchOperation,
                groupOperation,
                projectionOperation
        ), Attendance.class, AttendanceSummary.class).getMappedResults();
    }

    private MatchOperation getMatchOperation(String studentId) {
        Criteria priceCriteria = where("studentId").in(studentId);
        return match(priceCriteria);
    }

    private GroupOperation getGroupOperation() {
        return group("courseId")
                .last("courseId").as("courseId")
                .addToSet("attendanceId").as("attendanceIds")
                .sum("hoursAttended").as("totalHours");
    }

    private ProjectionOperation getProjectOperation() {
        return project("attendanceIds", "totalHours")
                .and("courseId").previousOperation();
    }
}