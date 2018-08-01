package com.dto;

import java.util.ArrayList;
import java.util.Date;

public class RankScore {

    String beltColor;
    Date awardedDate;
    String comments;

    public RankScore() {
    }

    public RankScore(String beltColor, Date awardedDate, String comments) {
        this.beltColor = beltColor;
        this.awardedDate = awardedDate;
        this.comments = comments;
    }

    public String getBeltColor() {
        return beltColor;
    }

    public void setBeltColor(String beltColor) {
        this.beltColor = beltColor;
    }

    public Date getAwardedDate() {
        return awardedDate;
    }

    public void setAwardedDate(Date awardedDate) {
        this.awardedDate = awardedDate;
    }

    public String getComments() {
        return comments;
    }

    public void setComments(String comments) {
        this.comments = comments;
    }
}
