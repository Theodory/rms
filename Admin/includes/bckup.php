        //pagination contents will be loaded here
//committed successively
$limit = 3;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
//
$sql = "SELECT * FROM libraries ORDER BY id ASC LIMIT $start_from, $limit";  
$result = mysql_query($sql);  

        <?php  
            $sql = "SELECT COUNT(id) FROM libraries";  
            $result = mysql_query($sql);  
            $row = mysql_fetch_row($result);  
            $total_records = $row[0];  
            $total_pages = ceil($total_records / $limit);  
            $pagLink = "<nav><ul class='pagination'>";  
            for ($i=1; $i<=$total_pages; $i++) {  
                         $pagLink .= "<li><a href='library.php?page=".$i."'>".$i."</a></li>";  
            };  
            echo $pagLink . "</ul></nav>";  
        ?>

        <script type="text/javascript">
            $(document).ready(function(){
            $('.pagination').pagination({
                    items: <?php echo $total_records;?>,
                    itemsOnPage: <?php echo $limit;?>,
                    cssStyle: 'light-theme',
                    currentPage : <?php echo $page;?>,
                    hrefTextPrefix : 'library.php?page='
                });
                });
            </script>