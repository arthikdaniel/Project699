package com.model;

import org.springframework.data.annotation.Id;

import java.util.Date;

public class Payment {


    @Id
    private String paymentId;
    private String studentId;
    private Date dateOfPayment;
    private double amount;
    private String comments;

    public Payment() {
    }

    public Payment(String paymentId, String studentId, Date dateOfPayment, double amount, String comments) {
        this.paymentId = paymentId;
        this.studentId = studentId;
        this.dateOfPayment = dateOfPayment;
        this.amount = amount;
        this.comments = comments;
    }

    public String getPaymentId() {
        return paymentId;
    }

    public void setPaymentId(String paymentId) {
        this.paymentId = paymentId;
    }

    public String getStudentId() {
        return studentId;
    }

    public void setStudentId(String studentId) {
        this.studentId = studentId;
    }

    public Date getDateOfPayment() {
        return dateOfPayment;
    }

    public void setDateOfPayment(Date dateOfPayment) {
        this.dateOfPayment = dateOfPayment;
    }

    public double getAmount() {
        return amount;
    }

    public void setAmount(double amount) {
        this.amount = amount;
    }

    public String getComments() {
        return comments;
    }

    public void setComments(String comments) {
        this.comments = comments;
    }
}
