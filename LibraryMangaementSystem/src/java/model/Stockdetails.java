package model;
// Generated 29 Dec, 2016 11:26:17 AM by Hibernate Tools 3.2.1.GA



/**
 * Stockdetails generated by hbm2java
 */
public class Stockdetails  implements java.io.Serializable {


     private Integer stockId;
     private int totalStock;
     private int availableStock;

    public Stockdetails() {
    }

    public Stockdetails(int totalStock, int availableStock) {
       this.totalStock = totalStock;
       this.availableStock = availableStock;
    }
   
    public Integer getStockId() {
        return this.stockId;
    }
    
    public void setStockId(Integer stockId) {
        this.stockId = stockId;
    }
    public int getTotalStock() {
        return this.totalStock;
    }
    
    public void setTotalStock(int totalStock) {
        this.totalStock = totalStock;
    }
    public int getAvailableStock() {
        return this.availableStock;
    }
    
    public void setAvailableStock(int availableStock) {
        this.availableStock = availableStock;
    }




}


