<?php

// // Set Session Message

// function set_message($msg)
// {
//     if (!empty($msg)) 
//     {
//         $_SESSION['MESSAGE'] = $msg;
//     } 
//     else 
//         {
//             $msg = "";
//         }
// }

// // Display Message
// function display_message()
// {
//     if (isset($_SESSION['MESSAGE'])) 
//     {
//         echo $_SESSION['MESSAGE'];
//         unset($_SESSION['MESSAGE']);
//     }
// }

// //Error Message
// function display_error($error)
// {
//     return '<div class="alert alert-danger">' . $error . '</div>';
// }

// // set_message(display_error(error: "please Fill in the Blanks"));

// // Success Message
// function display_succes($success)
// {
//     return '<div class="alert alert-success">' . $success . '</div>';
// }


// // get safe value
// function safe_value($con , $value)
// {
//     return mysqli_real_escape_string($con, $value);
// }


// //Login Checking 
// function login_system()
// {
//     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_login'])) 
//     {
//         global $con;
//         $username = safe_value($con, $_POST['username']);
//         $password = safe_value($con, $_POST['password']);



//         if (empty($username) || empty($password)) 
//         {
//             set_message(display_error("please Fill in the Blanks "));
//         } 
//         else 
//             {

//                 // query
//                 $query = "SELECT * FROM users where username ='$username' or email = '$username' AND password = '$password'";
//                 $result = mysqli_query($con, $query);

//                 if (mysqli_fetch_assoc($result)) 
//                 {
//                     $_SESSION['murtada']=$username;
//                     header("location: ./dashboard.php");
//                 } 
//                 else 
//                     {
//                         set_message(display_error("You are Entered worng Password or username"));
//                     }
//             }
//     }
// }

// //Add Category Function 

// function add_category()
// {

//     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cat_btn']))
//     {
//         global $con;
//         $category = safe_value($con , $_POST['category']);
        
//         if(empty($category))
//         {
//             set_message(display_error("please Enter Category Name"));
//         }
//         else
//             {
//                 $sql = "SELECT * FROM categories where cat_name = '$category'";
//                 $check = mysqli_query($con,$sql);

//                 if(mysqli_fetch_assoc($check))
//                 {
//                     set_message(display_succes('Category Already Exists :'));
//                 }
//                 else
//                     {
//                         global $con;
//                         $query = "INSERT INTO categories(cat_name,status) VALUES ('$category','1')";
//                         $result = mysqli_query($con, $query);
//                             if ($result) 
//                                 {
//                                     set_message(display_succes('Category Has been Saved in the database'));
//                                     echo "<a href='manage_category.php'>View Category</a>";
//                                 }
//                     }
//             }
//     }
// }


// // View category

// function view_cat()
//     {
//         global $con;
//         $sql = "SELECT * FROM categories";
//         return mysqli_query($con,$sql);
//     }


// // Active And Deactive 

// function active_status()
// {
//     global $con;

//     if(isset($_GET['opr']) && $_GET['opr']!="")
//     {
//         $operation = safe_value($con,$_GET['opr']);
//         $id = safe_value($con , $_GET['id']);

//         if($operation == 'active')
//         {
//             $status = 1;
//         }
//         else
//             {
//                 $status = 0;
//             }

//         $query = "UPDATE categories SET status = '$status' WHERE id='$id'";
//         $result = mysqli_query($con,$query);

//         if($result)
//         {
//             header("location:manage_category.php");
//         }
//     }
// }

// //Update Category 

// function update_cat()
// {
//     global $con;
//     if(isset($_POST['cat_btn_up']))
//     {
//         $category_name = safe_value($con, $_POST['category_up']);
//         $id = safe_value($con,$_POST['cat_id']);
//         if(!empty($category_name))
//         {
//             $sql = "UPDATE categories SET cat_name = '$category_name' where id='$id'";
//             $result = mysqli_query($con,$sql);
//             if($result)
//             {
//                 header("location:manage_category.php");
//             }
            
//         }
        
//     }
// }




// //--------------------------------------------- product Page----------------------------------------------------------//

// function save_products()
// {
//     global $con;

//     if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pro_btn']))
//     {
//         $cat_id = safe_value($con ,$_POST['cat_id']);
//         $product_name = safe_value($con,$_POST['product_name']);
//         $mrp = safe_value($con,$_POST['mrp']);
//         $price = safe_value($con,$_POST['price']);
//         $qty = safe_value($con,$_POST['qty']);
//         $desc = safe_value($con,$_POST['desc']);

//         $img = $_FILES['img']['name'];
//         $type=$_FILES['img']['type'];
//         $tmp_name=$_FILES['img']['tmp_name'];
//         $size=$_FILES['img']['size'];

//         $img_ext = explode('.',$img);
//         $img_correct_ext = strtolower(end($img_ext));
//         $allow = array('jpg','png','jpeg');
//         $path = "img/".$img;
        
//         $msg = "";
//         if(empty($product_name))
//         {
//             set_message(display_error("Please Enter Product Name"));
//         }
//         elseif(empty($mrp))
//         {
//             set_message(display_error("Please Enter MRP"));
//         }
//         elseif(empty($price))
//         {
//             set_message(display_error("Please Enter Price"));
//         }
//         elseif(empty($qty))
//         {
//             set_message(display_error("Please Enter QTY"));
//         }
//         elseif(empty($desc))
//         {
//             set_message(display_error("Please Enter Description"));
//         }
//         elseif(empty($img))
//         {
//             set_message(display_error("Please Enter Image"));
//         }
        
//         elseif(in_array($img_correct_ext,$allow))
//             {
//                 if($size<500000)
//                 {

//                     if ($cat_id == 0) 
//                     {
//                         set_message(display_error("Please Select Category"));
//                     } 
//                     else
//                         {
//                                 $query = "INSERT INTO  products(category_name , product_name , MRP , price , qty , img , description , status ) VALUES('$cat_id','$product_name','$mrp','$price','$qty','$img','$desc','1')";
//                                 $result = mysqli_query($con, $query);
                                
//                                 if ($result) 
//                                     {
//                                         set_message(display_succes('Product Has been Saved in the database'));
//                                         move_uploaded_file($tmp_name, $path);
//                                     }
                        
//                         }           
                            

//                 }
//                 else
//                     {
//                         set_message(display_error("the size image is big"));
//                     }
//             }
//             else
//                 {
//                 set_message(display_error("you can't Store This file :("));
//                 }
//     }
// }

// // View Products //


// function view_products()
// {
//     global $con;
//     $query = "SELECT products.p_id,categories.cat_name,products.product_name,products.MRP,products.price,products.qty,products.img,products.description,products.status FROM products INNER JOIN categories ON products.category_name = categories.id";
//     return $result = mysqli_query($con,$query);
// }



// // Active And Deactive 

// function active_status_product()
// {
//     global $con;

//     if (isset($_GET['opr']) && $_GET['opr'] != "") 
//     {
//         $operation = safe_value($con, $_GET['opr']);
//         $id = safe_value($con, $_GET['id']);

//         if ($operation == 'active') 
//         {
//             $status = 1;
//         } 
//         else 
//             {
//                 $status = 0;
//             }

//         $query = "UPDATE products SET status = '$status' WHERE p_id='$id'";
//         $result = mysqli_query($con, $query);

//         if ($result) {
//             header("location:manage_product.php");
//         }
//     }
// }








?>


