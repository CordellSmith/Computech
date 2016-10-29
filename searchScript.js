var category, x, y;

function verify()
{
	check = document.getElementById("dd_category").selectedIndex;
	if (check == 0)
		return false;
	else
		return true;
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