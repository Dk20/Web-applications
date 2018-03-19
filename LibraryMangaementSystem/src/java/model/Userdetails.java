package model;
// Generated 29 Dec, 2016 11:26:17 AM by Hibernate Tools 3.2.1.GA



/**
 * Userdetails generated by hbm2java
 */
public class Userdetails  implements java.io.Serializable {


     private Integer userId;
     private String name;
     private String doB;
     private String address;
     private String pincode;
     private String phNo;
     private String emailId;
     private int availableIssues;

    public Userdetails() {
    }

    public Userdetails(String name, String doB, String address, String pincode, String phNo, String emailId, int availableIssues) {
       this.name = name;
       this.doB = doB;
       this.address = address;
       this.pincode = pincode;
       this.phNo = phNo;
       this.emailId = emailId;
       this.availableIssues = availableIssues;
    }
   
    public Integer getUserId() {
        return this.userId;
    }
    
    public void setUserId(Integer userId) {
        this.userId = userId;
    }
    public String getName() {
        return this.name;
    }
    
    public void setName(String name) {
        this.name = name;
    }
    public String getDoB() {
        return this.doB;
    }
    
    public void setDoB(String doB) {
        this.doB = doB;
    }
    public String getAddress() {
        return this.address;
    }
    
    public void setAddress(String address) {
        this.address = address;
    }
    public String getPincode() {
        return this.pincode;
    }
    
    public void setPincode(String pincode) {
        this.pincode = pincode;
    }
    public String getPhNo() {
        return this.phNo;
    }
    
    public void setPhNo(String phNo) {
        this.phNo = phNo;
    }
    public String getEmailId() {
        return this.emailId;
    }
    
    public void setEmailId(String emailId) {
        this.emailId = emailId;
    }
    public int getAvailableIssues() {
        return this.availableIssues;
    }
    
    public void setAvailableIssues(int availableIssues) {
        this.availableIssues = availableIssues;
    }




}


