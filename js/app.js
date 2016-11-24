window.onload = function()
{

	/*
	 * ----------------------------------------------------------------------------------------
	 *  HIGHTLIGHT PROJECT IN MAIN CONTENT FROM NAV BAR
	 * ----------------------------------------------------------------------------------------
	 */
	(function(){
		var x = document.querySelectorAll('.nav-bar a'), y = document.querySelectorAll('.project a'),
			header_title = document.querySelector('.header h3'), foo;
		for(var i=0; i<x.length; i++)
		{
			x[i].addEventListener('mouseenter', function(){
				foo = this.getAttribute('data-name');
				header_title.innerHTML = foo;
				for(var j=0; j<y.length; j++)
				{
					if(y[j].getAttribute('data-name') == foo)
					{
						y[j].classList.add('highlighted');
					} else
					{
						y[j].classList.remove('highlighted');
					}
				}
			});
			x[i].addEventListener('mouseleave', function(){
				header_title.innerHTML = 'Projects';
				for(var j=0; j<y.length; j++)
				{
					y[j].classList.remove('highlighted');
				}
				
			})
		}
	})();
	/*
	 * ----------------------------------------------------------------------------------------
	 *  CHANGE HEADER TITLE FROM PROJECT HIGHLIGHTED 
	 * ----------------------------------------------------------------------------------------
	 */
	(function(){
		var x = document.querySelectorAll('.project a'), header_title = document.querySelector('.header h3'), foo;
		for(var i=0; i<x.length; i++)
		{
			x[i].addEventListener('mouseenter', function(){
				foo = this.getAttribute('data-name');
				//x[i].classList.remove('highlighted');
				header_title.innerHTML = foo;
			});
			x[i].addEventListener('mouseleave', function(){
				header_title.innerHTML = 'Projects';
			})
		}
	})();
}
