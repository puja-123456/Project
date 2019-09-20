
<style type="text/css">
  .article-rating{
    position: fixed;
    right: 0px;
    top:20%;
    z-index: 2;
    transform: translateX(300px);
    transition: all 0.5s ease;
    padding: 20px;
    width: 300px;
    border: 1px solid #000;
    background-color: #fff;

  }
  .article-rating.show_on_side{
    transform: translateX(0px);
  }
  .article-rating .thumbs-buttons{
    padding: 3px;
    margin-bottom: 15px;
  }
  .article-rating .thumbs-buttons button{
    width: 49%;
  }
  .article-rating .thumbs-buttons .thumbsup-icon{
    color:blue;
  }
  .article-rating .thumbs-buttons .thumbsdown-icon{
    color:grey;
  }
.trending-tickers .main_newsTicker li{
  color: #000;
  background: #fff;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  padding: 2px 10px;
  line-height: 35px;
  list-style: none;
  font-size: 15px;
  text-align: left;
}
.trending-tickers .fa-chevron-left, .trending-tickers .fa-chevron-right{    
    cursor: pointer;
  }/*
@media screen and (min-width: 767px){
  .trending-tickers .fa-arrow-left{    
    position: absolute;
    top: 30%;
    color: #000;
    font-size: 20px;
    right: 12%;
  }
  .trending-tickers .fa-arrow-right{    
    position: absolute;
    color: #000;
    font-size: 20px;
    right: 10%;
    
    top: 30%;
  }
}*/
@media screen and (max-width: 567px){
  .trending-tickers .fa-arrow-left{
           position: relative;
    top: 0px;
   left: 50px;
    font-size: 21px;
    color: #991100;
  }
  .trending-tickers .fa-arrow-right{
   position: relative;
    top: 0px;
    left: 120px;
    font-size: 21px;
    color: #991100;
  }
  .trending-tickers .main_newsTicker li{
    line-height: 25px !important;
    height: 25px !important;
  }
  .trending-tickers .main_newsTicker {
    height:  29px !important;
      overflow: hidden;
  }
}
.trending-tickers .td-trending-now-title{
    font-family: "Roboto", sans-serif;
    padding: 0px 10px;
    display: inline-block;
    margin-top: 3px;
    line-height: 35px;
    background-color: #ffffff;
    color: #94201c;
    font-weight: 500;
    font-size: 17px;
    float: left;
    border-right: 2px dashed #94201c;
  }
</style>

  <div class="article-rating">
    <div class="row text-center" style="margin-bottom: 3px;">
        <p>Was this article Helpful?</p>
    </div>
    <div class="row thumbs-buttons">
          <button class="btn btn-default thumbsup-icon"><i class="fa fa-thumbs-o-up animated pulse infinite"></i></button>
          <input type="hidden" value="0" id="thumbsup">
          <button class="btn btn-default thumbsdown-icon"><i class="fa fa-thumbs-o-down animated pulse infinite"></i></button>
          <input type="hidden" value="0" id="thumbsdown">
    </div>
    <div class="row show_on_click">
      <div class="row">
        <textarea id="comment1" class="comment-box-1" placeholder="Is there any way we can improve!"></textarea>
        <textarea id="comment2" class="comment-box-2" placeholder="Please tell us how to improve!"></textarea>
      </div>
      <div class="row">
        <button class="btn btn-primary btn-block click-on-button">Submit</button>
      </div>
    </div>
  </div>

  <script type="text/javascript">$().ready(function(){

    $(window).on("scroll",function(){
      $(".article-rating .show_on_click").hide();

      if ($(window).scrollTop() >= ($(document).height() - ($(window).height()*0.6) )*0.6  ){
          $(".article-rating").addClass("show_on_side");
      }
      else{
          $(".article-rating").removeClass("show_on_side");
      }
        $(".article-rating .thumbs-buttons .thumbsup-icon").on("click",function(){
            $("#thumbsup").val("1");
            $("#thumbsdown").val("0");
            $(".comment-box-1").show();
            $(".comment-box-2").hide();
              $(".article-rating .show_on_click").show();
        });

        $(".article-rating .thumbs-buttons .thumbsdown-icon").click(function(){
            $("#thumbsup").val("0");
            $("#thumbsdown").val("1");
            $(".comment-box-1").hide();
            $(".comment-box-2").show();
              $(".article-rating .show_on_click").show();

        });
    });
    $(".article-rating .click-on-button").on("click",function(){

      var id = $(this).attr('id');
      var article_id = '<?=$this_article['article_id']; ?>';
      var article_type = '<?=$this_article['article_type']; ?>';
      var comment = $("#comment1").val();
      var thumbs_up = $("#thumbsup").val();
      var thumbs_down = $("#thumbsdown").val();
      if(thumbs_down == "1"){
        var comment = $("#comment2").val();
      }
      $.ajax({
        url:"<?php echo base_url().'blog/article_rating'; ?>",
        type: 'POST',  // http method
        data: { id: id,article_id:article_id, article_type:article_type,thumbs_up:thumbs_up,thumbs_down:thumbs_down, comment:comment },  // data to submit
        success: function (res) {
          if(JSON.parse(res) == 'success'){
            $(".article-rating").removeClass("show_on_side");
            alert("Thanks for the feedback!");
            $('.article-rating').remove();
          }else{
            alert("It seems there is some problem, Please try again later.");
          }
        },
      });
    });
  });
  </script>
