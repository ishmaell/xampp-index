window.onload = function()
{
	/*
	 * ----------------------------------------------------------------------------------------
	 *  HIGHTLIGHT PROJECT IN MAIN CONTENT FROM NAV BAR
	 * ----------------------------------------------------------------------------------------
	 */
	 
	(function(){
		var x = document.querySelectorAll('.nav-bar a'), y = document.querySelectorAll('.project a'),
			header_title = document.querySelector('.header h3'), foo, timeout;
		for(var i=0; i<x.length; i++)
		{
			x[i].addEventListener('mouseenter', function(){
				foo = this.getAttribute('data-name');
				timeout = setTimeout(function(){
					header_title.innerHTML = foo;
				}, 100);
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
				timeout = setTimeout(function(){
					header_title.innerHTML = 'Projects';
				}, 100);
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
		var x = document.querySelectorAll('.project a'), y = document.querySelectorAll('.nav-bar a'), 
			z = document.querySelector('.content'), header_title = document.querySelector('.header h3'), foo, timeout;
		for(var i=0; i<x.length; i++)
		{
			x[i].addEventListener('mouseenter', function(){
				foo = this.getAttribute('data-name');
				timeout = setTimeout(function(){
					header_title.innerHTML = foo;
				}, 100);
				for(var j=0; j<y.length; j++)
				{
					if(y[j].getAttribute('data-name') == foo)
					{
						y[j].classList.add('active');
					} else
					{
						y[j].classList.remove('active');
					}
				}
			});
			z.addEventListener('mouseleave', function(){
				timeout = setTimeout(function(){
					header_title.innerHTML = 'Projects';
				}, 200);
				for(var j=0; j<y.length; j++)
				{
					y[j].classList.remove('active');
				}
			})
		}
	})();

	/*
	 * ----------------------------------------------------------------------------------------
	 *  SEARCH PROJECTS
	 * ----------------------------------------------------------------------------------------
	 */
	(function() {
		var search = document.getElementById('search')
		search.addEventListener('keyup', searchProject)
		
	})()
}

function searchProject() {
	var searchTerm = this.value;
	var row, project, a, dataName;
	row = document.getElementById('row');
	project = row.getElementsByClassName('project');
	for (var i = 0; i < project.length; i++) {
		
		dataName = project[i].getElementsByTagName('a')[0].getAttribute('data-name');
		if(dataName.toLowerCase().indexOf(searchTerm.toLowerCase()) > -1) {
			project[i].style.display = "";
		} else {
			project[i].style.display = "none";
		}
	}
}
