<!-- /.container-fluid -->
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

</div>
 <!-- /#page-wrapper -->
</div>
</div>
<!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script src="typeahead.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input.typeahead_memb').typeahead({
        name: 'typeahead_member',
        remote:'search.php?key=%QUERY',
        limit : 20
    });
});
</script>
<script>
    $(document).ready(function(){
    $('input.typeahead_student').typeahead({
        name: 'typeahead_student',
        remote:'search_st.php?key=%QUERY',
        limit : 20
    });
});
</script>
	
	<script>
    $(document).ready(function(){
    $('input.typeahead_book').typeahead({
        name: 'book_name',
        remote:'search_book.php?key=%QUERY',
        limit : 20
    });
});
    </script>
	
	
	


<script type="text/javascript">

    $(function () {

        $("input[name='merit_sts']").click(function () {

            if ($("#chkYes").is(":checked")) {

                $("#dvMarried").show();

            } else {

                $("#dvMarried").hide();

            }

        });

    });

</script>




<script>
function printDiv(timetable) {
     var printContents = document.getElementById('timetable').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<script>
function printDiv(income) {
     var printContents = document.getElementById('income').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<script src="file.js"></script>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","get_timetable.php?class="+str,true);
        xmlhttp.send();
    }
}

$(function() {
    $( "#name" ).autocomplete({
        source: 'search_students.php'
    });
});

$(function() {
    $( ".first_name" ).autocomplete({
        source: 'search_students.php'
    });
});

$(function() {
    $( "#book_name" ).autocomplete({
        source: 'search_books.php'
    });
});

$(function() {
    $( "#roll_no" ).autocomplete({
        source: 'searchid.php'
    });
});
</script>

 <script type='text/javascript'>
        function addFields(){
            // Number of inputs to create
            var number = document.getElementById("subject").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Subject " + (i+1)));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "subject" + i;
                input.class = "form-control";
                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
                container.appendChild(document.createElement("br"));
            }
        }
    </script>
	
	
	<script type='text/javascript'>
        function addExams(){
            // Number of inputs to create
            var number = document.getElementById("exams").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Exam Name  " + (i+1)+ " "));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "exams" + i;
                input.class = "form-control";
                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
                container.appendChild(document.createElement("br"));
            }
        }
    </script>
	
	
	
<script>
function goBack() {
    window.history.back();
}
</script>
<script>
	window.addEventListener("load",function(){
		var load_screen= document.getElementById("load_screen");
		document.body.removeChild(load_screen);
		});
</script>

</body>

</html>
