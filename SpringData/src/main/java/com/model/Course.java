package com.model;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

import java.util.Date;

@Document
public class Course {

    @Id
    private String courseId;

    private String courseName;

    private Date startDate;

    private Date endDate;

    private double mandatoryHours;





    public String getCourseName() {
        return courseName;
    }

    public void setCourseName(String courseName) {
        this.courseName = courseName;
    }

    public Date getStartDate() {
        return startDate;
    }

    public void setStartDate(Date startDate) {
        this.startDate = startDate;
    }

    public Date getEndDate() {
        return endDate;
    }

    public void setEndDate(Date endDate) {
        this.endDate = endDate;
    }

    public String getCourseId() {
        return courseId;
    }

    public void setCourseId(String courseId) {
        this.courseId = courseId;
    }

    public double getMandatoryHours() {
        return mandatoryHours;
    }

    public void setMandatoryHours(double mandatoryHours) {
        this.mandatoryHours = mandatoryHours;
    }

    public Course() {
    }

    public Course(String courseId, String courseName, Date startDate, Date endDate, double mandatoryHours) {
        this.courseId = courseId;
        this.courseName = courseName;
        this.startDate = startDate;
        this.endDate = endDate;
        this.mandatoryHours = mandatoryHours;
    }
}