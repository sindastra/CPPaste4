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

if($_GET['i'])
	if( ctype_alnum($_GET['i']) )
		$id = $_GET['i'];

if(!file_exists('pastes/' . $id))
	die('Paste does not exist.');

echo gzuncompress( file_get_contents('pastes/' . $id) );

header('Content-Type: text/plain');