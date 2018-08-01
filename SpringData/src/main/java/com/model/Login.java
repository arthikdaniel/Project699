package com.model;

import org.springframework.data.annotation.Id;

public class Login {

    @Id
    private String userName;
    private String password;
    private String loginRole;

    public Login(){

    }

    public Login(String userName, String password, String loginRole) {
        this.userName = userName;
        this.password = password;
        this.loginRole = loginRole;
    }


    public String getLoginRole() {
        return loginRole;
    }

    public void setLoginRole(String loginRole) {
        this.loginRole = loginRole;
    }

    public String getUserName() {
        return userName;
    }

    public void setUserName(String userName) {
        this.userName = userName;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
}
