<?php
/**
 * Get all active products from database
 */
function getAllProducts($dbConnection) {
    $sql = "SELECT product_id, name, price, description, image_url 
            FROM products 
            WHERE is_active = TRUE 
            ORDER BY product_id";
    
    $result = mysqli_query($dbConnection, $sql);
    $products = [];
    
    while($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    
    return $products;
}

/**
 * Get a single product by ID
 */
function getProductById($dbConnection, $productId) {
    $productId = mysqli_real_escape_string($dbConnection, $productId);
    $sql = "SELECT product_id, name, price, description, image_url 
            FROM products 
            WHERE product_id = '$productId' AND is_active = TRUE";
    
    $result = mysqli_query($dbConnection, $sql);
    return mysqli_fetch_assoc($result);
}

/**
 * Get all open jobs
 */
function getAllJobs($dbConnection) {
    $sql = "SELECT job_id, title, employment_type, short_summary, location 
            FROM jobs 
            WHERE is_open = TRUE 
            ORDER BY job_id";
    
    $result = mysqli_query($dbConnection, $sql);
    $jobs = [];
    
    while($row = mysqli_fetch_assoc($result)) {
        $jobs[] = $row;
    }
    
    return $jobs;
}

/**
 * Get a single job by ID
 */
function getJobById($dbConnection, $jobId) {
    $jobId = mysqli_real_escape_string($dbConnection, $jobId);
    $sql = "SELECT job_id, title, employment_type, short_summary, description, requirements, location 
            FROM jobs 
            WHERE job_id = '$jobId' AND is_open = TRUE";
    
    $result = mysqli_query($dbConnection, $sql);
    return mysqli_fetch_assoc($result);
}

/**
 * Get bread making class details
 */
function getBreadClass($dbConnection) {
    $sql = "SELECT class_id, name, description, image_url, price_ex_gst, gst_rate, schedule 
            FROM bread_classes 
            LIMIT 1";
    
    $result = mysqli_query($dbConnection, $sql);
    $class = mysqli_fetch_assoc($result);
    
    if($class) {
        $class['price_inc_gst'] = $class['price_ex_gst'] * (1 + $class['gst_rate']);
    }
    
    return $class;
}

/**
 * Submit job application
 */
function submitJobApplication($dbConnection, $jobId, $name, $email, $coverLetterPath, $resumePath) {
    $jobId = mysqli_real_escape_string($dbConnection, $jobId);
    $name = mysqli_real_escape_string($dbConnection, $name);
    $email = mysqli_real_escape_string($dbConnection, $email);
    $coverLetterPath = mysqli_real_escape_string($dbConnection, $coverLetterPath);
    $resumePath = mysqli_real_escape_string($dbConnection, $resumePath);
    
    $sql = "INSERT INTO job_applications (job_id, applicant_name, applicant_email, cover_letter_path, resume_path) 
            VALUES ('$jobId', '$name', '$email', '$coverLetterPath', '$resumePath')";
    
    return mysqli_query($dbConnection, $sql);
}

/**
 * Add item to cart (session-based)
 */
function addItemsToOrder($parDBConnection)
{
  if(isset($_POST['JOIN_CLASS'])){
    $class = getBreadClass($parDBConnection);
    if($class) {
        $_SESSION['PRODUCT_NUMBER'] = 'CLASS_' . $class['class_id'];
        $_SESSION['PRODUCT_IMAGE'] = $class['image_url'];
        $_SESSION['PRODUCT_NAME'] = $class['name'];
        $_SESSION['UNIT_PRICE'] = $class['price_inc_gst'];
        $_SESSION['QUANTITY_ORDERED'] = 1;
        $_SESSION['PICKUP_DATE'] = date("Y-m-d", strtotime("first saturday of next month"));
        $_SESSION['PICKUP_TIME'] = "09:00";
        $_SESSION['TOTAL_AMOUNT'] = $_SESSION['UNIT_PRICE'];
    }
  }
  
  if(isset($_POST['SHOPPINGCART'])){
    $_SESSION['QUANTITY_ORDERED'] = $_POST['tbQuantity'];
    $_SESSION['PICKUP_DATE'] = $_POST['tbPickUpDate'];
    $_SESSION['PICKUP_TIME'] = $_POST['tbPickUpTime'];
    $_SESSION['TOTAL_AMOUNT'] = $_SESSION['UNIT_PRICE'] * $_SESSION['QUANTITY_ORDERED'];
  }
  
  if(isset($_SESSION['UNIT_PRICE']) && isset($_SESSION['QUANTITY_ORDERED'])) {
      $_SESSION['TOTAL_AMOUNT'] = $_SESSION['UNIT_PRICE'] * $_SESSION['QUANTITY_ORDERED'];
      
      $orderItem = new OrderItem($_SESSION['PRODUCT_NUMBER']
                                ,$_SESSION['PRODUCT_NAME']
                                ,$_SESSION['UNIT_PRICE']
                                ,$_SESSION['TOTAL_AMOUNT']
                                ,$_SESSION['QUANTITY_ORDERED']
                                ,$_SESSION['PICKUP_DATE']
                                ,$_SESSION['PICKUP_TIME']
                                ,$_SESSION['PRODUCT_IMAGE']
                              );
      
      if(!isset($_SESSION['ARRAY_ORDERS'])) {
          $_SESSION['ARRAY_ORDERS'] = [];
      }
      array_push($_SESSION['ARRAY_ORDERS'], $orderItem);
  }
}

//This function must be called inside the script tag.
function createCard($productNumber, $productImage, $productName, $price)
{
  //below are echoes to javascript code.
  echo "productDetails = {productNumber:'$productNumber', productName:'$productName', price:'$price', image:'$productImage'};";
  echo "thisRow.appendChild(createCard(productDetails));";
}//function createCard($productNumber, $productImage, $productName, $price)

function generateSqlInsertIntoOrderline($parOrderNumber)
{
  $thisSQL = "INSERT INTO ORDERLINE(ProductNumber, OrderNumber, QuantityOrdered, PickUpDate, TotalAmount) VALUES ";
  foreach($_SESSION['ARRAY_ORDERS'] AS $orderItem){
    $thisSQL.="($orderItem->productNumber, $parOrderNumber, $orderItem->quantityOrdered, CONCAT('$orderItem->pickUpDate',' ','$orderItem->pickUpTime',':00'), $orderItem->totalAmount),";
  }

  return rtrim($thisSQL, ",");

}//function generateSqlInsertIntoOrderline()

/***********************************************************************
  * Function: getWorkingFolderURL()                                    *
  * Function Description:                                              *
  * outputs working folder URL. For example: if this file is in        *
  *   lucasLoaves/Processes folder, then the output will be:           *
  *   http://localhost/lucasLoaves/                          *
  *--------------------------------------------------------------------*
  * Parameter Description:                                             *
  * 1. parDifference. difference between original quantity and updated *
  *    quantity.                                                       *
  **********************************************************************/
  function getWorkingFolderURL()
  {
    $realDocRoot = realpath($_SERVER['DOCUMENT_ROOT']); //Applications/MAMP/htdocs
    $workingFolder = dirname(__DIR__);
    $prefix = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $suffix = str_replace($realDocRoot, '', $workingFolder)."/"; ///lucasLoaves/Processes/
    $folderUrl = $prefix . $_SERVER['HTTP_HOST'] . $suffix;
    return $folderUrl;
  }//function getWorkingFolderURL()

/***********************************************************************
  * Function: getCurrentFolderURL()                                    *
  * Function Description:                                              *
  * outputs current folder URL. For example: if this file is in        *
  *   lucasLoaves/Processes folder, then the output will be:           *
  *   http://localhost/lucasLoaves/Processes/                           *
  *--------------------------------------------------------------------*
  * Parameter Description:                                             *
  * 1. parDifference. difference between original quantity and updated *
  *    quantity.                                                       *
  **********************************************************************/
function getCurrentFolderURL()
{
  $realDocRoot = realpath($_SERVER['DOCUMENT_ROOT']);
  $realDirPath = realpath(__DIR__);
  $prefix = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
  $suffix = str_replace($realDocRoot, '', $realDirPath)."/";
  $folderUrl = $prefix . $_SERVER['HTTP_HOST'] . $suffix;
  return $folderUrl;
}//function getCurrentFolderURL()

function getLastInsertID($parDBConnection)
{
  $sql = "SELECT LAST_INSERT_ID()";  

  if($resultSet = mysqli_query($parDBConnection, $sql)){
    while($record = mysqli_fetch_array($resultSet, MYSQLI_ASSOC)){
      $lastInsertID = $record['LAST_INSERT_ID()'];
    }//while($record = mysqli_fetch_array($resultSet, MYSQLI_ASSOC)){
  }//if($resultSet = mysqli_query($parDBConnection, $sql)){
  return $lastInsertID;
}//function getLastInsertID()

function emptyCart(){
  $_SESSION['ARRAY_ORDERS']=[];

  //Display "Your cart is empty" if all items in array have been removed
  if(count($_SESSION['ARRAY_ORDERS'])==0){
    unset($_SESSION['NUMBER_OF_ITEMS_BOUGHT']);
    unset($_SESSION['ALL_ITEMS_BOUGHT']);
    unset($_SESSION['ORDER_NUMBER']);
    $_SESSION['GRAND_TOTAL']=0;
    $_SESSION['ITEM_COUNTER'] = 0;

  }
}//function emptyCart()


function recordOrderItem($parOrderItem){

  $_SESSION['ITEM_BOUGHT'] =  "thisColItemsContainer.appendChild(createShoppingCartItem({productNumber:$parOrderItem->productNumber";  
  $_SESSION['ITEM_BOUGHT'] .=  ",productName:'$parOrderItem->productName'";
  $_SESSION['ITEM_BOUGHT'] .=  ",unitPrice:$parOrderItem->unitPrice";
  $_SESSION['ITEM_BOUGHT'] .=  ",amount:$parOrderItem->totalAmount";
  $_SESSION['ITEM_BOUGHT'] .=  ",quantityOrdered: $parOrderItem->quantityOrdered";
  $_SESSION['ITEM_BOUGHT'] .=  ",pickUpDate:'$parOrderItem->pickUpDate'";
  $_SESSION['ITEM_BOUGHT'] .=  ",pickUpTime:'$parOrderItem->pickUpTime'";
  $_SESSION['ITEM_BOUGHT'] .=  ",image:'$parOrderItem->image'";
  $_SESSION['ITEM_BOUGHT'] .=  ",itemCounter: $parOrderItem->itemCounter}));";


  
  //record the grand total
  $_SESSION['ALL_ITEMS_BOUGHT'] .= $_SESSION['ITEM_BOUGHT'];
  $itemTotalAmount = $parOrderItem->quantityOrdered * $parOrderItem->unitPrice;  
  
  if(isset($_SESSION['GRAND_TOTAL']))
  { 
    $_SESSION['GRAND_TOTAL'] = $_SESSION['GRAND_TOTAL'] + $itemTotalAmount;    
  }
  else {
    $_SESSION['GRAND_TOTAL'] = $itemTotalAmount;    
  }
}//function recordOrderItem($arrayOrders)

function resetItemsBought(){
  $_SESSION['ALL_ITEMS_BOUGHT'] = "";
  $_SESSION['GRAND_TOTAL']=0;
}

/*****************************************************************************
 * Function: uploadImageFile($parThisFile, $parMemberID)                     *
 * Function Description:                                                     *
 * This function uploads the image file provided by the user to the server.  *
 * This function also renames the filename to member[x].jpg, where[x] is the *
 *    memberID. This is done so that the memberID is always unique.          *
 *---------------------------------------------------------------------------*
 * Parameter Description:                                                    *
 * 1. $parThisFile. the file uploaded by the user.                           *
 * 2. $parMemberID. memberID that forms part of the renamed file name.       *
 *    example: member1.jpg                                                   *
 *****************************************************************************/
function uploadFile($parThisFile)
{
    $userFolder = "../jobApplications/";
    $newFilename = $parThisFile['name'];
    $path_filename_ext = $userFolder.$newFilename;

    move_uploaded_file($parThisFile['tmp_name'], $path_filename_ext);

    return $newFilename;
}//function setMemberImageFilename($parOrigFilename)

?>
