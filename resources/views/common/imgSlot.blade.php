


<style>
	body {
		background:#434347;
		color:#fff;
	}

	.btn1 {
		display:inline-block;
		position:relative;

		z-index:10;
		background:#d10000;
		border:1px solid #d10000;
		color:#fff;
		width:auto;height:auto;
		padding:5px;
		border-radius:3px;
		cursor:pointer;
	}	

	.dot {
		display:inline-block;
		position:absolute;
		margin-top:255px;
		margin-left:-150px;
		z-index:10;
		background:#434347;
		color:#fff;
		width:140px;height:8px;
	
	}

	.delbtn {
		font-family: Verdana,Geneva,sans-serif; 
		display:inline-block;
		position:absolute;
		margin-top:-4px;
		margin-left:-30px;
		font-size:10px;
		line-height:15px;
		text-align:center;
		v-align: middle;
		z-index:10;
		background:#f00;
		border:1px solid #d10000;
		color:#fff;
		width:15px;height:15px;
		border-radius:3px;
		cursor:pointer;
	}

	.uploadbtn {
		font-family: Verdana,Geneva,sans-serif; 
		display:inline-block;
		position:absolute;
		margin-top:-4px;
		margin-left:-70px;
		font-size:10px;
		line-height:15px;
		text-align:center;
		v-align: middle;
		z-index:10;
		background:#096b53;
		border:1px solid #096b53;
		color:#fff;
		width:35px;height:15px;
		border-radius:3px;
		cursor:pointer;
	}    
	.img_parent {
		display:inline-block;
		position:relative;
		float:left;
		width:230px;
		height:280px;
		padding:15px;
	}	

	.img_sm {
		border:1px dashed #717171;
		width:230px;
		min-height:260px;
		max-height:260px;
		background:#282923;border-radius:3px;
		float:left;margin-right:5px;
		cursor:pointer;
		overflow:hidden;
	}	

</style>


<style>
    #drop-area {
      border: 2px dashed #ccc;
      border-radius: 10px;
      width: 300px;
      height: 200px;
      text-align: center;
      padding: 20px;
      font-family: Arial, sans-serif;
      color: #888;
    }
    #drop-area.hover {
      border-color: #666;
      background-color: #f0f0f0;
    }
    img {
      max-width: 100%;
      margin-top: 10px;
    }
  </style>


<div id="uploadbtn_" class="uploadbtn" style="background:#096b53;" onClick="save_base64s();">save_base64s</div>
<?php


$totimages =  $record['ImageSlot']['totImages'];
for ($i = 1; $i <= $totimages; $i++): ?>
    <div class="img_parent">
        <div id="dot_<?php echo $i; ?>sm" class="dot" style=""></div>
        <div id="uploadbtn_<?php echo $i; ?>sm" class="uploadbtn" style="background:#096b53;" onClick="upload_imgno(<?php echo $i; ?>);">...</div>
        <div id="delbtn_<?php echo $i; ?>sm" class="delbtn" style="background:#f00;" onClick="del_imgno(<?php echo $i; ?>);">X</div>
        <img id="container_<?php echo $i; ?>sm" class="img_sm" src="<?php echo $record['img' . $i]; ?>" onclick="set_imgno(<?php echo $i; ?>);">
    </div>
<?php endfor; ?>

<div style='display:none;'>
Pastes your image here..<br>
ontotita:<input type='text' value='chatgpt'  id='ontotita' name='ontotita' style='color:black; width:150px;'>
ont_id:<input type='text' value='{{ $record['id'] }}' id='ontotita_id' name='ontotita_id'  style='color:black; width:60px;'>
prefix:<input type='text' value='gpt_' id='prefix' name='prefix' style='color:black;  width:60px;'>
&nbsp;&nbsp;&nbsp;

<div id='container_img_no'>1</div>
<div id='containers' style='display:inline-block;width:100%;height:150px;'>




    <?php for ($i = 1; $i <= $totimages; $i++): ?>
    <div class="img_parent">
        <input type="text" class="form-control" style='display:xnone;'
        id="img<?php echo $i; ?>" name="img<?php echo $i; ?>" value="<?php echo $record['img' . $i]; ?>">
    </div>
    <?php endfor; ?>

<?php for ($i = 1; $i <= $totimages; $i++): ?>
<div id='res_<?php echo $i; ?>' style='width:100px;height:100px;'></div>
<?php endfor; ?>



<div class='clearfix'></div>
<br><br>
<img id="container" style='border:2px dashed #c10000;width:auto;height:auto;background:#c10000;border-radius:5px;'/>
<div class='clearfix'></div>
<div id="rs_jx">rs_jx</div>
<br>image base64:<br>
<br><textarea id='img_base64' style='width:800px;height:200px;'></textarea>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
		document.onpaste = function(pasteEvent) {
		var item = pasteEvent.clipboardData.items[0];
		container_img_no=document.getElementById("container_img_no").innerHTML;
		if (item.type.indexOf("image") === 0) {
			var blob = item.getAsFile();
			var reader = new FileReader();
			reader.onload = function(event) {
			console.log(event.target.result);
			document.getElementById("container").src = event.target.result;
            document.getElementById("img"+container_img_no).value = event.target.result;
			document.getElementById("container_"+container_img_no+"sm").src = event.target.result;
			document.getElementById("img_base64").value = event.target.result;
       save_base64s_hlp1(container_img_no,event.target.result);
		};
		reader.readAsDataURL(blob);
		inc_imgno();
		}

		}

		function del_imgno(img_no) {
		         document.getElementById("container_"+img_no+"sm").src='';
             document.getElementById("img"+img_no).value ='';
                          ontotita = document.getElementById("ontotita").value;
             ontotita_id = document.getElementById("ontotita_id").value;
                prefix = document.getElementById("prefix").value;
             arg1 = img_no;
                    $.ajax({    
                    type : "POST",   
                    url  : "{{ route('image.delbase64image') }}",   
                    dataType: "text", 
                    data :  {
                        fun:"delbase64image",
                        arg1:arg1,
                        ontotita:ontotita,
                        ontotita_id:ontotita_id,
                        prefix:prefix,
                        embed:'YES', 
                        _token: '{{ csrf_token() }}'},    
                        success :  function(data)       
                        {  document.getElementById('rs_jx').innerHTML='';     
                        document.getElementById('rs_jx').innerHTML=data;    
                        document.getElementById('res_'+img_no).innerHTML=document.getElementById('rs_jx_data').innerHTML; 
                        document.getElementById('rs_jx').innerHTML='';  
                        }    
                    }); 
		}

		function set_imgno(img_no) {
		         dots = document.getElementsByClassName("dot");
		         for (i = 0; i < dots.length; i++)  dots[i].style.background = "#434347";
		         dots[img_no-1].style.background = "yellow";
		         document.getElementById("container_img_no").innerHTML = img_no;
		}

		function inc_imgno() {
			     img_no = document.getElementById("container_img_no").innerHTML;
			     if (img_no=="<?php echo $totimages; ?>") return;
			     img_no=parseInt(img_no)+1;
			     set_imgno(img_no);
		}

    function upload_imgno(img_no) {
                    const input = document.createElement('input');
                    input.type = 'file';
                    input.accept = 'image/*';
                    input.style.display = 'none';
                    document.body.appendChild(input);
                    input.click();
                    input.addEventListener('change', (e) => {
                              const file = e.target.files[0];
                                if (!file) return;
                                const reader = new FileReader();
                                reader.onload = function(event) {
                                const base64 = event.target.result;
                                document.getElementById("container_"+img_no+"sm").src = base64;
                                console.log(base64);
                                save_uploadedphotobase64s_hlp1(img_no);
                                };
                        reader.readAsDataURL(file);

                    });
		}
            
    function save_uploadedphotobase64s_hlp1(img_no) {
                        dots  =  document.getElementById("container_"+img_no+"sm").src;
                    ontotita  =  document.getElementById("ontotita").value;
                    ontotita_id  =  document.getElementById("ontotita_id").value;
                        prefix  =  document.getElementById("prefix").value;
                    fun2_function='saveuploadedphoto_base64';
                            arg1=img_no;
                            arg2=dots;
                    $.ajax({    
                    type : "POST",   
                    url  : "{{ route('image.saveuploadedphotobase64image') }}",   
                    dataType: "text", 
                    data :  {
                        fun:fun2_function,
                        arg1:arg1,
                        arg2:arg2, 
                        ontotita:ontotita,
                        ontotita_id:ontotita_id,
                        prefix:prefix,
                        embed:'YES', 
                        _token: '{{ csrf_token() }}'},    
                        success :  function(data)       
                        {  document.getElementById('rs_jx').innerHTML='';     
                        document.getElementById('rs_jx').innerHTML=data;    
                        document.getElementById('res_'+img_no).innerHTML=document.getElementById('rs_jx_data').innerHTML; 
                        document.getElementById('rs_jx').innerHTML='';  
                        }    
                    }); 
        }	



    function save_base64s() {
                save_base64s_hlp1(1);
                save_base64s_hlp1(2);
                save_base64s_hlp1(3);
                save_base64s_hlp1(4);
                save_base64s_hlp1(5);
            }

    function save_base64s_hlp1(img_no,base64) {
              console.log(base64.length);
      console.log(base64);
                ontotita  =  document.getElementById("ontotita").value;
                ontotita_id  =  document.getElementById("ontotita_id").value;
                    prefix  =  document.getElementById("prefix").value;

                        arg1=img_no;
                $.ajax({    
                type : "POST",   
                url  : "{{ route('image.savebase64image') }}",   
                dataType: "text", 
                data :  {
                    fun:'save_base64',
                    arg1:arg1,
                    arg2:base64, 
                    ontotita:ontotita,
                    ontotita_id:ontotita_id,
                    prefix:prefix,
                    embed:'YES', 
                    _token: '{{ csrf_token() }}'},    
                    success :  function(data)       
                    {  document.getElementById('rs_jx').innerHTML='';     
                    document.getElementById('rs_jx').innerHTML=data;    
                    document.getElementById('res_'+img_no).innerHTML=document.getElementById('rs_jx_data').innerHTML; 
                    document.getElementById('rs_jx').innerHTML='';  
                    }    
                }); 
    }		
</script>

</div>

<div id="drop-area">
    Drop your image here
    <br><br>
    <small>(Only one image at a time)</small>
    <div id="preview"></div>
</div>






<script>
    const dropArea = document.getElementById('drop-area');
    const preview = document.getElementById('preview');

    // Prevent default behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
      dropArea.addEventListener(eventName, e => e.preventDefault());
      dropArea.addEventListener(eventName, e => e.stopPropagation());
    });

    // Highlight drop area
    ['dragenter', 'dragover'].forEach(eventName => {
      dropArea.addEventListener(eventName, () => dropArea.classList.add('hover'));
    });

    ['dragleave', 'drop'].forEach(eventName => {
      dropArea.addEventListener(eventName, () => dropArea.classList.remove('hover'));
    });

    // Handle drop
    dropArea.addEventListener('drop', e => {
      const files = e.dataTransfer.files;

      [...files].forEach((file, index) => {
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(event) {
          const base64String = event.target.result;

            container_img_no=document.getElementById("container_img_no").innerHTML;
            document.getElementById("container").src = event.target.result;
            document.getElementById("img"+container_img_no).value = event.target.result;
            document.getElementById("container_"+container_img_no+"sm").src = event.target.result;
            inc_imgno();
          
          // Show image preview
          //preview.innerHTML = `<img src="${base64String}" alt="Preview"><br><small>Base64:</small><br><textarea rows="5" cols="40">${base64String}</textarea>`;
          
          // You can also log or send this base64 string
          console.log(base64String);
        };
        reader.readAsDataURL(file);
      } else {
        alert("Please drop a valid image file.");
    }
    });
  });
  </script>