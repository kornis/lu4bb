

var menu = document.querySelector('.wrapper');
var menu_ul = document.querySelector('.menu_small_ul');
var boton = document.querySelectorAll('.boton');
menu.addEventListener('click',actionMenu);

	for(i=0;i<boton.length;i++)
	{
		boton[i].addEventListener('click',displayWrap);	
	}

function displayWrap(e)
{
	var item = e.target.nextElementSibling;

	for(i=0;i<item.classList.length;i++)
	{
		if(item.classList[i] == "wrap")
		{
			e.target.nextElementSibling.classList.toggle('menu_wrap');
		}
	}
	
	
	
}

function actionMenu(e)
{
	divMenu = document.querySelector('.menu_small');
	divMenu.classList.toggle('hidden');
	menu_ul.classList.toggle('menu_ul');
	
}
