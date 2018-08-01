package com.dto;

import com.model.Attendance;

import java.util.List;

public class AttendanceSummary {

    private String courseId;
    private List<String> attendanceIds;
    private float totalHours;

    public String getCourseId() {
        return courseId;
    }

    public void setCourseId(String courseId) {
        this.courseId = courseId;
    }

    public List<String> getAttendanceIds() {
        return attendanceIds;
    }

    public void setAttendanceIds(List<String> attendanceIds) {
        this.attendanceIds = attendanceIds;
    }

    public float getTotalHours() {
        return totalHours;
    }

    public void setTotalHours(float totalHours) {
        this.totalHours = totalHours;
    }

    @Override
    public String toString() {
        return "AttendanceSummary{" +
                "courseId='" + courseId + '\'' +
                ", attendanceIds=" + attendanceIds +
                ", totalHours=" + totalHours +
                '}';
    }
}
