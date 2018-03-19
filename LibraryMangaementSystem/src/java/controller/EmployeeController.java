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
public class EmployeeController {
    
    @RequestMapping("/employee")
    public ModelAndView employee(HttpServletRequest request,HttpServletResponse res) throws Exception {
        ModelAndView mv = new ModelAndView("employee");
        return mv;
    }   
    @RequestMapping("/addemployee")
    public ModelAndView addemployee(HttpServletRequest request,HttpServletResponse res) throws Exception {
        ModelAndView mv = new ModelAndView("employee");
        ModelAndView mv1 = new ModelAndView("index");
        Session session = HibernateUtil.getSessionFactory().openSession();
        String name=request.getParameter("Name");
        String dob=request.getParameter("DoB"); 
        String address=request.getParameter("Address");
        String pincode=request.getParameter("Pincode");
        String Ph_no=request.getParameter("Ph_no");
        String email_id=request.getParameter("email_id");
        String user_name=request.getParameter("user_name");
        String password=request.getParameter("password");
        int empid=0;
        Employeedetails ed = new Employeedetails(name,dob,address,pincode,Ph_no,email_id,user_name,password);
        Transaction t = session.getTransaction();
        t.begin();
        List<Employeedetails> result = session.createQuery("from Employeedetails").list();
        Iterator<Employeedetails> itr = result.iterator();
        while(itr.hasNext())
            {
                Employeedetails ed1 = itr.next();
                if(user_name.equals(ed1.getUserName()))
                {
                    mv.addObject("message","Username already present.. Please try again..");
                    return mv;
                }
                empid=ed1.getEmpId();
            }
        session.saveOrUpdate(ed);
        t.commit();
        session.close();
        mv1.addObject("message","Registration Sucessful. Your Employee id is "+(empid+1));
        return mv1;
    }
}
