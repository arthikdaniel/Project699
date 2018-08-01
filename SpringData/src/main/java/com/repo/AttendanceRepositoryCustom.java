package com.repo;


import com.dto.AttendanceSummary;
import org.springframework.data.repository.query.Param;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.data.rest.core.annotation.RestResource;

import java.util.List;


public interface AttendanceRepositoryCustom {

    List<AttendanceSummary> getSummaryAggregateByStudentId(String studentId);

}