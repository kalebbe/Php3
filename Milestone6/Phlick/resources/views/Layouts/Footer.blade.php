<!--
   -@Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
   -@Project Name: Phlick Project
   -@Professor:    James Gordon
   -@Course:       CST-256
   -@Date:         03/04/18
 -->
<div id="FooterDiv"
     style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#cccccc;">
    <ul class="list-inline">
        @if(!Session::get('ACCESS'))
            <li><a href="#">Request Company Account</a></li>
        @endif
    </ul>
    <p class="copyright">Phlick © 2018</p>
</div>
<script src="/Phlick/assets/js/jquery.min.js"></script>
<script src="/Phlick/assets/bootstrap/js/bootstrap.min.js"></script>