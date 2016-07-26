<?php 
include "prim.php";

// $graph = array(
//         0=>array(0,314,268,330,265,232,329,337,309,339),
//         1=>array(314,0,320,385,333,246,292,285,337,229),
//         2=>array(268,320,0,296,236,293,385,313,236,332),
//         3=>array(330,385,296,0,314,327,306,229,237,346),
//         4=>array(265,333,236,314,0,306,341,246,247,322),
//         5=>array(232,246,293,327,306,0,281,365,293,320),
//         6=>array(329,292,385,306,341,281,0,301,308,214),
//         7=>array(337,285,313,229,246,365,301,0,304,274),
//         8=>array(309,337,236,237,247,293,308,304,0,335),
//         9=>array(339,229,332,346,322,320,214,274,335,0),
//     );

    if(isset($_POST['btn-upload']))
    {
        $uploaddir = __DIR__ . '/uploads';

        if(isset($_FILES['input_file'])){
          $errors= array();
          $file_name = $_FILES['input_file']['name'];
          $file_size =$_FILES['input_file']['size'];
          $file_tmp =$_FILES['input_file']['tmp_name'];
          $file_type=$_FILES['input_file']['type'];

          // $file_ext=strtolower(end(explode('.',$_FILES['input_file']['name'])));
          // $expensions= array("txt");
          // if(in_array($file_ext,$expensions)=== false){
          //    $errors[]="extension not allowed, please choose a txt file.";
          // }
          
            if (move_uploaded_file($_FILES['input_file']['tmp_name'], "$uploaddir/$file_name")) {
                ini_set("memory_limit",-1);
                $new_graph = array();
                $node_no = $_POST['node_no'];

                $input_file = "$uploaddir/$file_name";
            
                $myfile = fopen($input_file, "r") or die("Unable to open file!");
                $i = 0;
                while(! feof($myfile))
                {
                    $lines = fgets($myfile); // one line in each time
                    // this is because at the end of the line it's generating empty array
                    if ($lines === false) {
                        break;
                     }
                    $splitedArray = preg_split('#\s+#', $lines, null, PREG_SPLIT_NO_EMPTY);
                    $new_graph[$i] = $splitedArray;
                    $i++;
                }
                fclose($myfile);

                $primsAlgorithm = new PrimsAlgorithm();
                $primsAlgorithm->Prim($new_graph, $node_no);

            }else{
                 die("file is not uploaded.");
            }
       } else {
        die("you did not select any input file");
       }
    }
?>
<?php require("header.php"); ?>

    

<?php require("footer.php"); ?>
