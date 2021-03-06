package com.dto;

public class Guardian {

    private String firstName;
    private String lastName;

    private ContactInfo contactInfo;

    public Guardian() {
    }

    public Guardian(String firstName, String lastName, ContactInfo contactInfo) {
        this.firstName = firstName;
        this.lastName = lastName;
        this.contactInfo = contactInfo;
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

    public ContactInfo getContactInfo() {
        return contactInfo;
    }

    public void setContactInfo(ContactInfo contactInfo) {
        this.contactInfo = contactInfo;
    }
}
