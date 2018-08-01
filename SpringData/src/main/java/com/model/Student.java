package com.model;

import com.dto.ContactInfo;
import com.dto.Guardian;
import com.dto.RankScore;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

import java.util.Date;
import java.util.List;

@Document
public class Student {

    @Id
    private String studentId;

    private String firstName;
    private String lastName;

    private Date dateOfBirth;

    @DBRef(lazy = true)
    private List<Course> course_ids;

    private ContactInfo contactInfo;

    private List<Guardian> guardians;

    private List<RankScore> rankScores;

    public ContactInfo getContactInfo() {
        return contactInfo;
    }

    public void setContactInfo(ContactInfo contactInfo) {
        this.contactInfo = contactInfo;
    }

    public List<RankScore> getRankScores() {
        return rankScores;
    }

    public void setRankScores(List<RankScore> rankScores) {
        this.rankScores = rankScores;
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public String getStudentId() {
        return studentId;
    }

    public void setStudentId(String studentId) {
        this.studentId = studentId;
    }

    public List<Guardian> getGuardians() {
        return guardians;
    }

    public void setGuardians(List<Guardian> guardians) {
        this.guardians = guardians;
    }

    public List<Course> getCourse_ids() {
        return course_ids;
    }

    public void setCourse_ids(List<Course> course_ids) {
        this.course_ids = course_ids;
    }

    public Date getDateOfBirth() {
        return dateOfBirth;
    }

    public void setDateOfBirth(Date dateOfBirth) {
        this.dateOfBirth = dateOfBirth;
    }

    public Student() {
    }


    public Student(String studentId, String firstName, String lastName, Date dateOfBirth, List<Course> course_ids, ContactInfo contactInfo, List<Guardian> guardians, List<RankScore> rankScores) {
        this.studentId = studentId;
        this.firstName = firstName;
        this.lastName = lastName;
        this.dateOfBirth = dateOfBirth;
        this.course_ids = course_ids;
        this.contactInfo = contactInfo;
        this.guardians = guardians;
        this.rankScores = rankScores;
    }
}

