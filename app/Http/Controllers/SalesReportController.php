<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ConfirmProduct;    
use App\BuyerCustomer;

class SalesReportController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date('d-m-Y');
        $year = date('Y');

        $todayAllBuyerCustomers = BuyerCustomer::where('date', $date)->where('year', $year)->orderBy('id', 'desc')->get();
        
        
        return view('sales_reports.index', compact('todayAllBuyerCustomers')); 
    }
    public function todayParticularCustomerBuyDetails($customerId)
    {
        $todayBuyerCustomerExactBuyDetails = BuyerCustomer::with(['confirmProducts', 'confirmProducts.product', 'confirmProducts.product.category'])
        ->where('id', $customerId)->firstOrFail();
        
        return view('sales_reports.current_day_particular_cus_pro', compact('todayBuyerCustomerExactBuyDetails'));
    }
    public function yesterdayAllBuyerCustomer()
    {   date_default_timezone_set('Asia/Dhaka');
        $yesterday = date('d-m-Y',strtotime('-1 days'));
        $year = date('Y');
        $yesterdayAllBuyerCustomers = BuyerCustomer::where('date', $yesterday)->where('year', $year)->orderBy('id', 'desc')->get();
        return view('sales_reports.yesterday-all-sale', compact('yesterdayAllBuyerCustomers'));
    }
    public function yesterdayParticularCustomerBuyDetails($customerId)
    {
        $yesterdayBuyerCustomerExactBuyDetails = BuyerCustomer::with(['confirmProducts', 'confirmProducts.product', 'confirmProducts.product.category'])
        ->where('id', $customerId)->firstOrFail();
        return view('sales_reports.yesterday_particular_customer_buying_details', compact('yesterdayBuyerCustomerExactBuyDetails')); 
    }
    public function currentMonthAllSale()
    {   
        $month = date('F');
        $year = date('Y');
        $currentMonthAllSalesDate = BuyerCustomer::where('month', $month)->where('year', $year)->select('date')
        ->distinct()->orderBy('id','desc')->get();

        $currentMonthTotalSale = $this->currentMonthTotalSale($month, $year);

       
        return view('sales_reports.current-month-all-saling-details', compact('currentMonthAllSalesDate', 'currentMonthTotalSale'));

    }
    public function currentMonthDateWiseCustomer($date)
    {
        $year = date('Y');
        $AllBuyerCustomersOfThisDate = BuyerCustomer::where('date', $date)->where('year', $year)
        ->orderBy('id','desc')->get();
        return view('sales_reports.current-month-date-wise-buyer-customers', compact('AllBuyerCustomersOfThisDate', 'date'));
       
    }
    public function currentMonthParticularCusBuyDetails($customerId){
        $currentMonthBuyerCustomerExactBuyDetails = BuyerCustomer::with(['confirmProducts', 'confirmProducts.product', 'confirmProducts.product.category'])
        ->where('id', $customerId)->firstOrFail();
        return view('sales_reports.current-month-perticular-customer-buying-details', compact('currentMonthBuyerCustomerExactBuyDetails'));
    }

    private function currentMonthTotalSale($month, $year)
    {

        $allCustomerOfThisMonth = BuyerCustomer::with('confirmProducts')->where('month', $month)->where('year', $year)->get();
       
        $currentMonthTotalSale = 0;
        foreach($allCustomerOfThisMonth as $customer){
            $totalPrice = 0;
            foreach ($customer->confirmProducts as $confirmProduct) {
            $totalPrice = $totalPrice + $confirmProduct->quantity * $confirmProduct->product->price;
            }
            $currentMonthTotalSale = $currentMonthTotalSale + $totalPrice;;
        }
        return $currentMonthTotalSale;
         
    }
    public function salesReportsOfAllMonth()
    {
        $year = date('Y');
        $allMonth = BuyerCustomer::where('year', $year)->select('month')->distinct()->get();
        return view('sales_reports.sales-reports-of-all-months', compact('allMonth', 'year'));

    }
    public function particularMonthWiseAllSellingDate($month)
    {   
        $month = $month;
        $year = date('Y');
        $MonthWiseAllSellingDates = BuyerCustomer::where('month', $month)->where('year', $year)
        ->select('date')->distinct()->get();
        $perticularMonthTotalSale = $this->currentMonthTotalSale($month, $year);
        return view('sales_reports.month-wise-all-selling-dates', compact('MonthWiseAllSellingDates', 'perticularMonthTotalSale', 'month'));
    }
    public function particularMonthParticularDateWiseCustomers($date)
    {
        $year = date('Y');
        $date = $date;
        $month = BuyerCustomer::where('date', $date)->where('year', $year)->select('month')
        ->distinct()->first();
        
        $AllBuyerCustomersOfThisDate = BuyerCustomer::where('date', $date)->where('year', $year)
        ->orderBy('id','desc')->get();
        return view('sales_reports.particular-month-particular-date-wise-customer', compact('AllBuyerCustomersOfThisDate','month', 'date'));
    }
    public function perticular_month_particular_date_wise_customer_buying_details($customerId)
    {
        $ParticularMontParticularDateWisehBuyerCustomerExactBuyDetails = BuyerCustomer::with(['confirmProducts', 'confirmProducts.product', 'confirmProducts.product.category'])
        ->where('id', $customerId)->firstOrFail();
        return view('sales_reports.particular-month-particular-date-wise-customer-buying-details', compact('ParticularMontParticularDateWisehBuyerCustomerExactBuyDetails'));
    }
}
