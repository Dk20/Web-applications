/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.util.Iterator;
import java.util.List;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import model.Bookdetails;
import model.Employeedetails;
import model.HibernateUtil;
import model.Issuedbookdetails;
import model.Returnbookdetails;
import model.Stockdetails;
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
public class LibraryController {
    
    
    
    @RequestMapping("/logout")
    public ModelAndView logout(HttpServletRequest request,HttpServletResponse res) throws Exception {
        ModelAndView mv1 = new ModelAndView("index");
       /* request.getSession().invalidate();
        res.setHeader("Cache-Control","no-cache");
        res.setHeader("Cache-Control","no-store");
        res.setDateHeader("Expires",0); */
        return mv1;
    }
    
    @RequestMapping("/admin")
    public ModelAndView admin(HttpServletRequest request,HttpServletResponse res) throws Exception {
        ModelAndView mv1 = new ModelAndView("library");
        return mv1;
    }
    
    @RequestMapping("/library")
    public ModelAndView library(HttpServletRequest request,HttpServletResponse res) throws Exception {
        ModelAndView mv1 = new ModelAndView("library");
        ModelAndView mv2 = new ModelAndView("index");
        try {
            Session session = HibernateUtil.getSessionFactory().openSession();
            session.beginTransaction();
            String username=request.getParameter("user_name");
            String password=request.getParameter("password"); 
            List<Employeedetails> result = session.createQuery("from Employeedetails").list();
            session.getTransaction().commit();
            Iterator<Employeedetails> itr = result.iterator();
            while(itr.hasNext())
            {
                Employeedetails ed = itr.next();
                if(username.equals(ed.getUserName()))
                {
                    if(password.equals(ed.getPassword()))
                    {
                        String message = "HELLO   "+ed.getName()+"   !!!";
                        mv1.addObject("message",message);
                        return mv1;
                    }
                        
                }             
            }
            
        } catch(Exception e)
        {
            e.printStackTrace();
        }
        String message = "Wrong User Name or Password!!";
                        mv2.addObject("message",message);
                        return mv2;
    }
    
    @RequestMapping("/issuebook") 
    public ModelAndView issuebook(HttpServletRequest request,HttpServletResponse res)
    {  
        
        ModelAndView mv1 = new ModelAndView("issuebook1");
        Session session = HibernateUtil.getSessionFactory().openSession();
        session.beginTransaction();
        List<Userdetails> result = session.createQuery("from Userdetails").list();
        mv1.addObject("users",result);
        session.getTransaction().commit();
        return mv1;
    }
    
    @RequestMapping("/issuebook1") 
    public ModelAndView issuebook1(HttpServletRequest request,HttpServletResponse res)
    {  
        
        ModelAndView mv1 = new ModelAndView("issuebook2");
        ModelAndView mv2 = new ModelAndView("issuebook1");
        int userid = Integer.parseInt(request.getParameter("userid"));
        int availchk=0;
        Session session = HibernateUtil.getSessionFactory().openSession();
        session.beginTransaction();
        List<Userdetails> result = session.createQuery("from Userdetails where userId='"+userid+"'").list();
        //session.getTransaction().commit();
        Iterator<Userdetails> itr = result.iterator();
        while(itr.hasNext())//bookdetail search
        {
            Userdetails ud = itr.next();
            availchk = ud.getAvailableIssues();
        }
        if(availchk>0)
        {
            List<Bookdetails> result2 = session.createQuery("from Bookdetails").list();
            mv1.addObject("books",result2);
            mv1.addObject("userid",userid);
            mv1.addObject("availchk",availchk);
            session.getTransaction().commit();
            return mv1;
        }
        //session.beginTransaction();
        List<Userdetails> result1 = session.createQuery("from Userdetails").list();
        String message = "User Issue quota is over!!";
        mv2.addObject("message",message);
        mv2.addObject("users",result1);
        session.getTransaction().commit();
        return mv2;
    }
    
    @RequestMapping("/issuebook2") 
    public ModelAndView issuebook2(HttpServletRequest request,HttpServletResponse res)
    {  
        
        ModelAndView mv1 = new ModelAndView("issuebook1");
        //ModelAndView mv = new ModelAndView("issuebook2");
        int userid = Integer.parseInt(request.getParameter("userid"));
        int stockid = Integer.parseInt(request.getParameter("stockid"));
        String doi = request.getParameter("doi");
        String dor = request.getParameter("dor");
        int availchk = Integer.parseInt(request.getParameter("availchk"));
        int availbookchk=0;
        Session session = HibernateUtil.getSessionFactory().openSession();
        session.beginTransaction();
        List<Stockdetails> result = session.createQuery("from Stockdetails where stockId='"+stockid+"'").list();
        //session.getTransaction().commit();
        Iterator<Stockdetails> itr = result.iterator();
        while(itr.hasNext())//bookdetail search
        {
            Stockdetails sd = itr.next();
            availbookchk = sd.getAvailableStock();
        }
        if(availbookchk>0)
        {
            Issuedbookdetails ud = new Issuedbookdetails(stockid,userid,doi,dor);
            Transaction t = session.getTransaction();
            t.begin(); 
            session.saveOrUpdate(ud);
            t.commit();
            availchk=availchk-1;
            availbookchk=availbookchk-1;
            Transaction t1 = session.getTransaction();
            t1.begin();
            //session.saveOrUpdate(login);name,dob,address,pincode,Ph_no,email_id
            Query query1 = session.createQuery("update Userdetails set availableIssues='"+availchk+"' where userId='"+userid+"'");
            query1.executeUpdate();
            t1.commit();
            Transaction t2 = session.getTransaction();
            t2.begin();
            //session.saveOrUpdate(login);name,dob,address,pincode,Ph_no,email_id
            Query query2 = session.createQuery("update Stockdetails set availableStock='"+availbookchk+"' where stockId='"+stockid+"'");
            query2.executeUpdate();
            t2.commit();
            session.beginTransaction();
            mv1.addObject("message","Book Issued");
            List<Userdetails> result2 = session.createQuery("from Userdetails").list();
            mv1.addObject("users",result2);
            session.getTransaction().commit();
            return mv1;
        }
            session.beginTransaction();
            mv1.addObject("message","Book Unavailable");
            List<Userdetails> result2 = session.createQuery("from Userdetails").list();
            mv1.addObject("users",result2);
            session.getTransaction().commit();
            return mv1;
    }
    
    @RequestMapping("/returnbook") 
    public ModelAndView returnbook(HttpServletRequest request,HttpServletResponse res)
    {  
        
        ModelAndView mv1 = new ModelAndView("returnbook");
        Session session = HibernateUtil.getSessionFactory().openSession();
        session.beginTransaction();
        List<Userdetails> result = session.createQuery("from Userdetails").list();
        mv1.addObject("users",result);
        List<Userdetails> result1 = session.createQuery("from Bookdetails").list();
        mv1.addObject("books",result1);
        session.getTransaction().commit();
        return mv1;
    }
    
    @RequestMapping("/returnbook1") 
    public ModelAndView returnbook1(HttpServletRequest request,HttpServletResponse res)
    {  
        
        ModelAndView mv1 = new ModelAndView("returnbook");
        
        int userid = Integer.parseInt(request.getParameter("userid"));
        int stockid = Integer.parseInt(request.getParameter("stockid"));
        //String doi = request.getParameter("doi");
        String dor = request.getParameter("dor");
        int availchk=0; //= Integer.parseInt(request.getParameter("availchk"));
        int availbookchk=0;
        String isfined = "N";
        Session session = HibernateUtil.getSessionFactory().openSession();
        
        session.beginTransaction();
        List<Userdetails> result1 = session.createQuery("from Userdetails where userId='"+userid+"'").list();
        //session.getTransaction().commit();
        Iterator<Userdetails> itr1 = result1.iterator();
        while(itr1.hasNext())
        {
            Userdetails ud = itr1.next();
            availchk = ud.getAvailableIssues()+1;
        }
        Transaction t1 = session.getTransaction();
            t1.begin();
            //session.saveOrUpdate(login);name,dob,address,pincode,Ph_no,email_id
            Query query1 = session.createQuery("update Userdetails set availableIssues='"+availchk+"' where userId='"+userid+"'");
            query1.executeUpdate();
            t1.commit();
        
        session.beginTransaction();
        List<Stockdetails> result = session.createQuery("from Stockdetails where stockId='"+stockid+"'").list();
        //session.getTransaction().commit();
        Iterator<Stockdetails> itr = result.iterator();
        while(itr.hasNext())
        {
            Stockdetails sd = itr.next();
            availbookchk = sd.getAvailableStock()+1;
        }
        Transaction t2 = session.getTransaction();
            t2.begin();
            //session.saveOrUpdate(login);name,dob,address,pincode,Ph_no,email_id
            Query query2 = session.createQuery("update Stockdetails set availableStock='"+availbookchk+"' where stockId='"+stockid+"'");
            query2.executeUpdate();
            t2.commit();
            
            Returnbookdetails rd = new Returnbookdetails(stockid,userid,dor,isfined);
            Transaction t = session.getTransaction();
            t.begin(); 
            session.saveOrUpdate(rd);
            t.commit();
        mv1.addObject("message","Book Returned");
        //Session session = HibernateUtil.getSessionFactory().openSession();
        session.beginTransaction();
        List<Userdetails> result3 = session.createQuery("from Userdetails").list();
        mv1.addObject("users",result3);
        List<Userdetails> result4 = session.createQuery("from Bookdetails").list();
        mv1.addObject("books",result4);
        session.getTransaction().commit();
        return mv1;
    }
}
