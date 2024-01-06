<style>
	#digModal{
		display: none;
		position: relative;
		top: 50%;
		left: 50%;
		width: 90%;
		transform: translate(-50%, -50%);
		padding: 20px;
		background-color: #ffffff;
		z-index: 999999;
	}

	#overlay{
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, 0.5);
		z-index: 999998;
	}
</style>

<?php 
// change the get_page_by_path to the slug of the desired page for the modal
$page = get_page_by_path('change-this');
$id = $page->ID;

$args = array(
	'post_type'				=> 'page',
	'page_id'				=> $id
);

$query = new WP_Query($args);

echo'<div id="digModal" style="display:none">';
while ($query -> have_posts()) : $query -> the_post();


	the_post_thumbnail();
		the_content();

endwhile;
echo '<button id="closeDigModal">Close</button>
</div><!--end modal-->
<div id="overlay"></div><!--overlay-->';
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('digModal');
    const overlay = document.getElementById('overlay');

    function openDigModal() {
        modal.style.display = 'block';
        overlay.style.display = 'block';
    }
    function closeDigModal() {
        modal.style.display = 'none';
        overlay.style.display = 'none';
    }

    // Create and style button trigger
    var button = document.createElement('button');
    button.type = 'button';
    button.setAttribute('id', 'openDigModal');
    button.textContent = 'Test for modal';
    button.style.position = 'fixed';
    button.style.left = 0;
    button.style.bottom = 0;
	button.style.zIndex = 99999;

    document.body.appendChild(button);
    button.addEventListener('click', openDigModal);
    document.getElementById('closeDigModal').addEventListener('click', closeDigModal);
    overlay.addEventListener('click', closeDigModal);
});

	</script>
