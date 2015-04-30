<?php
/**
 * CPPaste4
 * Copyright (C) 2015 Sindastra <sindastra@gmail.com>
 *
 * The above copyright notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author Sindastra <sindastra@gmail.com>
 * @copyright (C) 2015 Sindastra <sindastra@gmail.com>
 */

function hilight_code($string)
{
	$swapColors = array(
			'<span style="color: #000000">' => '<span style="color: #0f0">',
			'<span style="color: #DD0000">' => '<span style="color: #ff0">',
			'<span style="color: #007700">' => '<span style="color: #58f">',
			'<span style="color: #0000BB">' => '<span style="color: #fff">',
			'<span style="color: #FF8000">' => '<span style="color: #ccc">'
		);

	$highlighted = highlight_string($string, true);

	return str_replace(array_keys($swapColors), $swapColors, $highlighted);
}

if($_GET['i'])
	if( ctype_alnum($_GET['i']) )
		$id = $_GET['i'];

if(!file_exists('pastes/' . $id))
	die('Paste does not exist.');

if($_GET['raw'])
{
	header('Content-Type: text/plain');
	echo gzuncompress( file_get_contents('pastes/' . $id) );
}
else
{
	echo '<!doctype html><html><head>';
	echo '<meta charset="utf-8">';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
	echo '<style>body{background:#020;font-size:11.5px;}</style>';
	echo '</head><body>';
	echo hilight_code( gzuncompress( file_get_contents('pastes/' . $id) ) );
	echo '</body></html>';
}