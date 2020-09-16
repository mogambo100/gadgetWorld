//Function To Download Features List

function LoadFeatures(value)
{
	features_module=document.getElementById('features');
	features_module.innerHTML="";
	
	if(value==0)
	{
		return;	
	}

	xhr=new XMLHttpRequest();
	xhr.open("GET","getfeatures.php?cid="+value);
	xhr.send();

	xhr.onreadystatechange=function()
	{
		if(xhr.readyState==4)
		{
			features=JSON.parse(xhr.responseText);

			
			for(i=0;i<features.length;i++)
			{
				div=document.createElement('div');
				div.setAttribute('class','form-group');

				label=document.createElement('label');
				label.innerHTML=features[i].name;

				input=document.createElement('input');
				input.setAttribute('type','text');
				input.setAttribute('class','form-control');
				input.setAttribute('name','features['+features[i].featureid+']');

				div.appendChild(label);
				div.appendChild(input);

				features_module.appendChild(div);

			}
			

		}
	}
}