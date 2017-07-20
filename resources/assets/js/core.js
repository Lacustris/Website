/**
 * Returns the width of the window
 */
function WindowWidth()
{
	var w = window,
    	d = document,
    	e = d.documentElement,
    	g = d.getElementsByTagName('body')[0],
    	res = w.innerWidth || e.clientWidth || g.clientWidth;
	
	return res;
}

/**
 * Returns the height of the window
 */
function WindowHeight()
{
	var w = window,
    	d = document,
    	e = d.documentElement,
    	g = d.getElementsByTagName('body')[0],
    	res = w.innerHeight || e.clientHeight || g.clientHeight;
	
	return res;
}

export default {
	windowWidth: 	WindowWidth,
	windowHeight: 	WindowHeight
};
