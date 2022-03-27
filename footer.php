<script>

function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
	}
document.getElementById("default").click();

$(document).ready(function(){
	$('#togbtn').click(function(){
		$('span.dayError').toggleClass('textandbuttonRemove');
		$('span.claimError').toggleClass('textandbuttonRemove');
		$('span.hourError').toggleClass('textandbuttonRemove');
		$('#togbtn').toggleClass('textandbuttonRemove');
	});
});

$.ajax({
    url:"fetchsupplies2.php",
    method:"",
    data:{},
    dataType:"text",
    success:function(data)
    {
        $('#suppresult').html(data);
    }
    });

$(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt = $(this).val();
            if(txt != '')
            {
                $.ajax({
                    url:"fetchsupplies.php",
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#suppresult').html(data);
                    }
                });
            }
            else
            {
                //$('#suppresult').html('No data');
                $.ajax({
                    url:"fetchsupplies.php",
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#suppresult').html(data);
                    }
                });
            }
        });
    });

$.ajax({
    url:"fetchfa2.php",
    method:"",
    data:{},
    dataType:"text",
    success:function(data)
    {
        $('#faresult').html(data);
    }
    });

$(document).ready(function(){
        $('#search_text2').keyup(function(){
            var txt = $(this).val();
            if(txt != '')
            {
                $.ajax({
                    url:"fetchfa.php",
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#faresult').html(data);
                    }
                });
            }
            else
            {
                //$('#suppresult').html('No data');
                $.ajax({
                    url:"fetchfa.php",
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#faresult').html(data);
                    }
                });
            }
        });
    });

</script>

</body>
</html>