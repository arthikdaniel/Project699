package com.model;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

import java.util.Date;

@Document
public class Attendance {


    @Id
    private String attendanceId;

    private String studentId;

    private String courseId;

    private Date dateOfAttendance;
    private double hoursAttended;
    private String comments;

    public Attendance(){}

    public Attendance(String attendanceId, String studentId, String courseId, Date dateOfAttendance, double hoursAttended, String comments) {
        this.attendanceId = attendanceId;
        this.studentId = studentId;
        this.courseId = courseId;
        this.dateOfAttendance = dateOfAttendance;
        this.hoursAttended = hoursAttended;
        this.comments = comments;
    }

    public String getAttendanceId() {
        return attendanceId;
    }

    public String getStudentId() {
        return studentId;
    }

    public String getCourseId() {
        return courseId;
    }

    public Date getDateOfAttendance() {
        return dateOfAttendance;
    }

    public double getHoursAttended() {
        return hoursAttended;
    }

    public String getComments() {
        return comments;
    }

    @Override
    public String toString() {
        return "Attendance{" +
                "attendanceId='" + attendanceId + '\'' +
                ", studentId='" + studentId + '\'' +
                ", courseId='" + courseId + '\'' +
                ", dateOfAttendance=" + dateOfAttendance +
                ", hoursAttended=" + hoursAttended +
                ", comments='" + comments + '\'' +
                '}';
    }

    public void setAttendanceId(String attendanceId) {
        this.attendanceId = attendanceId;
    }

    public void setStudentId(String studentId) {
        this.studentId = studentId;
    }

    public void setCourseId(String courseId) {
        this.courseId = courseId;
    }

    public void setDateOfAttendance(Date dateOfAttendance) {
        this.dateOfAttendance = dateOfAttendance;
    }

    public void setHoursAttended(double hoursAttended) {
        this.hoursAttended = hoursAttended;
    }

    public void setComments(String comments) {
        this.comments = comments;
    }
}
