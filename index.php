<?php require 'head.php'; ?>
<style type="text/css">
.form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
.form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
}
.form-signin input[type="text"],
.form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
}
</style>

<?php
// date_default_timezone_set('PRC');
// $currentTime = date("Y-m-d H:i:s",time());
// //$date = strtotime(time());echo $date;
// $time = time();
// $nextMonthDays = getNextMonthDays($currentTime);
// print_r($nextMonthDays);
// function getNextMonthDays($date){
//   $timestamp=strtotime($date);
//   $arr=getdate($timestamp);
//   $seconds = $arr['seconds'];
//   $minutes = $arr['minutes'];
//   $hours = $arr['hours'];
//   $mday = $arr['mday'];
//   $mon = $arr['mon'];
//   $year = $arr['year'];
//   $yday = $arr['yday'];
//   $timestamp = $arr['0'];
//   if ($arr['mon']+2 > 12) {
//     $year = $arr['year'] + 1;
//     $mon = $arr['mon'] + 2 - 11;
//   }else{
//     $year = $arr['year'];
//     $mon = $arr['mon']+2;
//   }
//   $returnArr['seconds'] = $seconds;
//   $returnArr['minutes'] = $minutes;
//   $returnArr['hours'] = $hours;
//   $returnArr['mday'] = $mday;
//   $returnArr['year'] = $year;
//   $returnArr['yday'] = $yday;
//   $returnArr['mon'] = $mon;
//   $remondTime = strtotime($year.'-'.$mon.'-'.$mday.' '.$hours.':'.$minutes.':'.$seconds);
//   $returnArr['remondTime'] = $remondTime;
//   $returnArr['borrowTime'] = $timestamp;
  
//   return $returnArr;


// }




//exit;
require_once './models/book.php';
require_once './models/record.php';
if ( $_SERVER['REQUEST_METHOD']=='GET' ) {
    $page     = $_GET['page'];
    $pageSize = $_GET['pageSize'];
    $key      = $_GET['searchKey'];
    if ( empty( $page ) ) {
        $page = 1;
    }
    if ( empty( $pageSize ) ) {
        $pageSize = 10;
    }

    if ( empty( $key ) ) {
        $key = "";
    }
    $books = BookManager::searchBooksWithRecordInfo( $key, $page, $pageSize );
    if ( $books === false || count( $books["books"] ) == 0 ) {
        //echo "<script>history.back();alert('没有数据');</script>";
        return;
    }
}
// set_error_handler("customError");

// function customError($errno, $errstr)
//  { 
//  echo "<b>Error:</b> [$errno] $errstr<br />";
//  echo "Ending Script";
//  die();
//  }

?>

<div class="container-fluid">
    <div class="row-fluid">

      <div id="content">
        <h3 id="store_h3">图书列表</h3>
        <form id="tab" class="form-horizontal " method="GET" action="index.php">
      <div class="control-group">
          <input type="text" name="searchKey" class="input-xlarge">
          <button class="btn btn-primary" type="submit" id="submit">搜索</button>
      </div>
    </form>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>编号</th>
              <th>书名</th>
              <th>状态</th>
              <th>借阅人</th>
              <th>借阅时间</th>
            </tr>
          </thead>
          <tbody id="store_list">
            <?php
foreach ( $books['books'] as $book ) {
    $bookStatuStr = "";
    if ( $book->status == 0 ) {
        $bookStatuStr = "在库";
    } else if ( $book->status == -1 ) {
            $bookStatuStr = "丢失";
        } else {
        $bookStatuStr = "借出";
    }
    echo "<tr>"
        ."<td>".$book->sunccoNo."</td>"
        ."<td><a href='bookDetail.php?bookId=$book->bookId'>".$book->name."</a></td>"
        ."<td>".$bookStatuStr."</td>"
        ."<td>".$book->currentRecord->personName."</td>"
        ."<td>".$book->currentRecord->borrowTime."</td>"
        ."</tr>";
}
?>
        </tbody>
      </table>
      <div id="pageNavId" class="span9 offset2" style="text-align: right;margin-bottom: 30px;"></div>
    </div>

    <script src="/static/js/external/pagenav1.1.min.js"></script>
    <?php
echo "<script type=\"text/javascript\">"
    ."pageNav.pageNavId=\"pageNavId\";"
    ."pageNav.pre=\"上一页\";"
    ."pageNav.next=\"下一页\";"
    ."pageNav.url=\"/index.php?page={index}&pageSize=$pageSize\";"
    ."pageNav.fn = function(p,pn){"
    ."};"
    ."pageNav.go($books[currentPage],$books[pageSum]);"
    ."</script>";
?>
</div>
</div>
<?php require 'foot.php'; ?>
