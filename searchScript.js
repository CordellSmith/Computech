var category, x, y;

function setCase()
{
	
}

function getCategory()
{

	x = document.getElementById("dd_category").selectedIndex;
	y = document.getElementById("dd_category").options;

	if (x == 0)
		return -1;
	else
	{
		course = y[x].text;
		return course;
	}
}