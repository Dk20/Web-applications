/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.util.Iterator;
import java.util.List;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import model.Employeedetails;
import model.HibernateUtil;
import model.Userdetails;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.Transaction;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;
/**
 *
 * @author Pranab K Karmakar
 */

@Controller
public class UserController {
    
    @RequestMapping("/userdisplay")
    public ModelAndView userdisplay(HttpServletRequest hsr, HttpServletResponse hsr1) throws Exception {
        ModelAndView mv = new ModelAndView("userdisplay");
        String out = "All User Details:";
        try {
            Session session = HibernateUtil.getSessionFactory().openSession();
            session.beginTransaction();
            List result = session.createQuery("from Userdetails").list();
            mv.addObject("userdetails", result);
            session.getTransaction().commit();
        } catch(Exception e)
        {
            e.printStackTrace();
        }
        mv.addObject("message", out);
        return mv;
    }
    
    @RequestMapping(value="/edituser")
    public ModelAndView edituser(@RequestParam int id) {
        ModelAndView mv = new ModelAndView("edituserform");
        String out = "User Details:";
        try {
            Session session = HibernateUtil.getSessionFactory().openSession();
            session.beginTransaction();
            List result = session.createQuery("from Userdetails where userId='"+id+"'").list();
            mv.addObject("userdetails", result);
            session.getTransaction().commit();
        } catch(Exception e)
        {
            e.printStackTrace();
        }
        mv.addObject("message", out);
        return mv;
    }
    
    @RequestMapping("/editusersave") 
    public ModelAndView editsave(HttpServletRequest request,HttpServletResponse res) {  
        
        ModelAndView mv1 = new ModelAndView("userdisplay");
        
        Session session = HibernateUtil.getSessionFactory().openSession();
        int id=Integer.parseInt(request.getParameter("id"));
        String name=request.getParameter("name"); 
        String dob=request.getParameter("dob");
        String address=request.getParameter("address");
        String pin=request.getParameter("pin");
        String ph=request.getParameter("ph");
        String email=request.getParameter("email");
        
        Transaction t = session.getTransaction();
        t.begin();
        //session.saveOrUpdate(login);name,dob,address,pincode,Ph_no,email_id
        Query query1 = session.createQuery("update Userdetails set name='"+name+"', dob='"+dob+"', address='"+address+"', pincode='"+pin+"', Ph_no='"+ph+"', email_id='"+email+"' where userId='"+id+"'");
        query1.executeUpdate();
        t.commit();
        mv1.addObject("message", "Edit User Successful.");
        List result = session.createQuery("from Userdetails").list();
        mv1.addObject("userdetails", result);
        session.close();
       
        return mv1;  
        
    }
    
    @RequestMapping(value="/dltuser")
    public ModelAndView dltuser(@RequestParam int id) {
        ModelAndView mv = new ModelAndView("userdisplay");
        
            Session session = HibernateUtil.getSessionFactory().openSession();
            session.beginTransaction();
            Transaction t = session.getTransaction();
            t.begin();
            Query query1 = session.createQuery("delete from Userdetails where userId='"+id+"'");
        query1.executeUpdate();
        t.commit();
        mv.addObject("message", "User Deleted Successfully.");
        List result = session.createQuery("from Userdetails").list();
        mv.addObject("userdetails", result);
        session.close();
        
        
        return mv;
    }
    
    @RequestMapping("/adduser") 
    public ModelAndView adduser(HttpServletRequest request,HttpServletResponse res) {  
        
        ModelAndView mv1 = new ModelAndView("insertuser");
        return mv1;
    }
    
    @RequestMapping("/insertuser") 
    public ModelAndView insertuser(HttpServletRequest request,HttpServletResponse res) {  
        
        ModelAndView mv1 = new ModelAndView("userdisplay");
        Session session = HibernateUtil.getSessionFactory().openSession();
        String name=request.getParameter("Name");
        String dob=request.getParameter("DoB"); 
        String address=request.getParameter("Address");
        String pincode=request.getParameter("Pincode");
        String Ph_no=request.getParameter("Ph_no");
        String email_id=request.getParameter("email_id");
        int avail_issue = 2;
        Userdetails ud = new Userdetails(name,dob,address,pincode,Ph_no,email_id,avail_issue);
        Transaction t = session.getTransaction();
        t.begin(); 
        session.saveOrUpdate(ud);
        t.commit();
        mv1.addObject("message", "Add User Successful.");
        List result1 = session.createQuery("from Userdetails").list();
        mv1.addObject("userdetails", result1);
        session.close();      
        return mv1;  
        
    }
    
}
