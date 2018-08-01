package com.repo;


import com.dto.AttendanceSummary;
import com.model.Attendance;
import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface AttendanceRepository extends MongoRepository<Attendance, String>, AttendanceRepositoryCustom {

    public List<Attendance> findByStudentId(@Param("studentId") String studentId);

    public List<Attendance> findByStudentIdAndCourseId(@Param("studentId") String studentId, @Param("courseId") String courseId);

    public List<Attendance> findByStudentIdOrderByCourseId(@Param("studentId") String studentId);

}