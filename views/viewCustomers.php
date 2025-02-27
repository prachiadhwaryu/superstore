<?php
session_start();
if (!isset($_SESSION['username'])) {
   header("Location: ../index.php"); 
   } 
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>View Customers | Superstore
      </title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://kit.fontawesome.com/1c67a52d9b.js" crossorigin="anonymous"></script>
      <script type="stylesheet" src="style.css"></script>
      <?php
         require '../config/dbConnection.php';

         try {
            $query= "SELECT customer_id, first_name, last_name, phone_no FROM customer_master";

             // set the resulting array to associative
             $result = mysqli_query($link,$query);
             // $row=$result->fetch_assoc();
             // $row = mysqli_fetch_assoc($result);
             // var_dump($row);  
            }
         catch(Exception $e) {
             echo "Error: " . $e->getMessage();
         }


         ?>
   </head>
   <body>
      <section class="vh-auto" style="background-color: #eee;">
         <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="col-lg-12 col-xl-11">
                  <div class="container mt-3">
                     <div class="card" style="border-radius: 25px;">
                        <div class="card-body">
                           <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">View Customers <i class="fa-solid fa-user mx-1"></i></p>
                           <div class="container">
                              <div class="row clearfix">
                                 <div class="col-md-12 table-responsive">
                                    <table class="table table-hover table-sortable" id="invoiceList">
                                       <thead>
                                          <tr >
                                             <th class="text-center">
                                                Customer ID
                                             </th>
                                             <th class="text-center">
                                                Customer Name
                                             </th>
                                             <th class="text-center">
                                                Customer Phone
                                             </th>
                                             <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">Modify
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php while($row = mysqli_fetch_assoc($result)) : ?>
                                          <tr id='addr0' data-id="0" class="hidden">
                                             <td data-name="invoiceId" class="text-center">
                                                <?php echo $row["customer_id"]; ?>
                                             </td>
                                             <td class="text-center"> <?php echo $row["first_name"]." ".$row["last_name"]; ?>      </td>
                                             <td class="text-center"> <?php echo $row["phone_no"]; ?> </td>
                                             <td data-name="del" class="text-center">
                                                   <a href=<?php echo '"../controllers/editCustomer.php?cid='.$row["customer_id"].'"';?>><button name="del0" class='btn btn-info'><span aria-hidden="true">Edit</span></button></a>
                                             </td>
                                          </tr>
                                        <?php  endwhile; ?>
                                       </tbody>
                                    </table>
                                    <button type="reset" class="btn btn-info" onclick="window.location='../views/homePage.php';">Back</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

              
   </body>
</html>