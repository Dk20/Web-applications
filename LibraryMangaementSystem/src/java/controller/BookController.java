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
public class BookController {
    
    @RequestMapping("/bookdisplay")
    public ModelAndView bookdisplay(HttpServletRequest hsr, HttpServletResponse hsr1) throws Exception {
        ModelAndView mv = new ModelAndView("bookdisplay");
        String out = "All Book Details:";
        try {
            Session session = HibernateUtil.getSessionFactory().openSession();
            session.beginTransaction();
            List result = session.createQuery("from Bookdetails").list();
            mv.addObject("bookdetails", result);
            session.getTransaction().commit();
        } catch(Exception e)
        {
            e.printStackTrace();
        }
        mv.addObject("message", out);
        return mv;
    }
    /*
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
    */
    @RequestMapping("/addbook") 
    public ModelAndView addbook(HttpServletRequest request,HttpServletResponse res)
    {  
        
        ModelAndView mv1 = new ModelAndView("insertbook");
        return mv1;
    }
    
    @RequestMapping("/insertbook") 
    public ModelAndView insertbook(HttpServletRequest request,HttpServletResponse res) 
    {
        
        
        ModelAndView mv1 = new ModelAndView("bookdisplay");
        Session session = HibernateUtil.getSessionFactory().openSession();
        String bookname=request.getParameter("bookname");
        String authorname=request.getParameter("authorname"); 
        int stockid=0;
        int bookno=Integer.parseInt(request.getParameter("bookno"));
        int i=0;
        int totalbook=0;
        int avail=0;
        
        try {
            session.beginTransaction();
            List<Bookdetails> result = session.createQuery("from Bookdetails").list();
            //session.getTransaction().commit();
            Iterator<Bookdetails> itr = result.iterator();
            while(itr.hasNext())//bookdetail search
            {
                Bookdetails bd = itr.next();
                if(bookname.equals(bd.getBookName()))
                {
                    if(authorname.equals(bd.getAuthorName()))
                    {
                   stockid = bd.getStockId();
                    List<Stockdetails> result1 = session.createQuery("from Stockdetails where stockId='"+stockid+"'").list();
                    //session.getTransaction().commit();
                    Iterator<Stockdetails> itr1 = result1.iterator();
                    while(itr1.hasNext())
                    {
                        Stockdetails sd = itr1.next();
                        totalbook = sd.getTotalStock()+bookno;
                        avail = sd.getAvailableStock()+bookno;                       
                    }
                    Transaction t1 = session.getTransaction();
                    t1.begin();
                    //session.saveOrUpdate(login);name,dob,address,pincode,Ph_no,email_id
                    Query query1 = session.createQuery("update Stockdetails set totalStock='"+totalbook+"', availableStock='"+avail+"' where stockId='"+stockid+"'");
                    query1.executeUpdate();
                    t1.commit();
                    for(i=0;i<bookno;i++)
                    {
                        Bookdetails bd1 = new Bookdetails(stockid,bookname,authorname);
                        Transaction t = session.getTransaction();
                        t.begin(); 
                        session.saveOrUpdate(bd1);
                        t.commit();
                    }
                    mv1.addObject("message", "Add Book Successful."); 
                    List result2 = session.createQuery("from Bookdetails").list();
                    mv1.addObject("bookdetails", result2);
                    session.close();      
                    return mv1; 
                    }//end if
                }
            }
            
        } catch(Exception e)
        {
            e.printStackTrace();
        }
        Stockdetails sd = new Stockdetails(bookno,bookno);
        Transaction t = session.getTransaction();
        t.begin(); 
        session.saveOrUpdate(sd);
        t.commit();
        //System.out.print(bookno); 
        session.beginTransaction();
        List<Stockdetails> result1 = session.createQuery("from Stockdetails").list();
        session.getTransaction().commit();
        Iterator<Stockdetails> itr1 = result1.iterator();
        while(itr1.hasNext())
        {
            Stockdetails sd1 = itr1.next();
            stockid = sd1.getStockId();
        }
        //System.out.print(bookno);           
        for(i=0;i<bookno;i++)
                    {
                        Bookdetails bd1 = new Bookdetails(stockid,bookname,authorname);
                        Transaction t3 = session.getTransaction();
                        t3.begin(); 
                        session.saveOrUpdate(bd1);
                        t3.commit();
                    }
                    mv1.addObject("message", "Add Book Successful."); 
                    List result2 = session.createQuery("from Bookdetails").list();
                    mv1.addObject("bookdetails", result2);
                    session.close();      
                    return mv1;
        
    }
    
}
