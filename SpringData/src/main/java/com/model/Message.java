package com.model;

import org.springframework.data.annotation.Id;

import java.util.Date;

public class Message {

    @Id
    private String messageId;
    private String studentId;
    private Date dateOfPost;
    private String messageTitle;
    private String messageDesc;

    public Message() {
    }

    public Message(String messageId, String studentId, Date dateOfPost, String messageTitle, String messageDesc) {
        this.messageId = messageId;
        this.studentId = studentId;
        this.dateOfPost = dateOfPost;
        this.messageTitle = messageTitle;
        this.messageDesc = messageDesc;
    }

    public String getMessageId() {
        return messageId;
    }

    public void setMessageId(String messageId) {
        this.messageId = messageId;
    }

    public String getStudentId() {
        return studentId;
    }

    public void setStudentId(String studentId) {
        this.studentId = studentId;
    }

    public Date getDateOfPost() {
        return dateOfPost;
    }

    public void setDateOfPost(Date dateOfPost) {
        this.dateOfPost = dateOfPost;
    }

    public String getMessageTitle() {
        return messageTitle;
    }

    public void setMessageTitle(String messageTitle) {
        this.messageTitle = messageTitle;
    }

    public String getMessageDesc() {
        return messageDesc;
    }

    public void setMessageDesc(String messageDesc) {
        this.messageDesc = messageDesc;
    }

}
