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

function RandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min; //The maximum is exclusive and the minimum is inclusive
}

export default {
	windowWidth: 	WindowWidth,
	windowHeight: 	WindowHeight,
	randomInt:		RandomInt
};
