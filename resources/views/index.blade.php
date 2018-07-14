@extends('layouts.user')

@section('content')

<transition name="fade">
  <router-view transition="fade" transition-mode="out-in" class="animated"></router-view>
</transition>

<section id="subfooter" class="subfooter">
	<div class="container">
		<div class="row"><div class="column col-md-4"><div class="subfooter-column"><div id="text-6" class="widget widget_text"><div class="widget-title heading">About</div>			<div class="textwidget"><p>ROIC is a learning platform specialized on new technologies like the blockchain.</p>
<p>We want to connect people and give everybody more access to informations about the digital world.</p>
</div>
		</div></div></div><div class="column col-md-4"><div class="subfooter-column"><div id="ctwg-recent-posts-3" class="widget ctwg-recent"><div class="widget-title heading">Recent News</div>
		<div class="ctwg-recent" id="ctwg-recent-posts-3">
						<div class="ctwg-recent-item ctwg-has-thumbnail">
								<a class="ctwg-recent-image" href="https://roic.io/2018/03/12/create-and-sell-online-courses/">
					<img width="150" height="150" src="https://roic.io/wp-content/uploads/2018/03/office-pen-calculator-computation-163032-150x150.jpeg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" title="" srcset="https://roic.io/wp-content/uploads/2018/03/office-pen-calculator-computation-163032-150x150.jpeg 150w, https://roic.io/wp-content/uploads/2018/03/office-pen-calculator-computation-163032-300x300.jpeg 300w, https://roic.io/wp-content/uploads/2018/03/office-pen-calculator-computation-163032-100x100.jpeg 100w, https://roic.io/wp-content/uploads/2018/03/office-pen-calculator-computation-163032-400x400.jpeg 400w" sizes="(max-width: 150px) 100vw, 150px">				</a>
								<div class="ctwg-recent-body">
					<div class="ctwg-recent-title">
						<a href="https://roic.io/2018/03/12/create-and-sell-online-courses/">Create and sell online courses</a>
					</div>
					<div class="ctwg-recent-meta">March 12, 2018</div>
				</div>
			</div>
						<div class="ctwg-recent-item ctwg-has-thumbnail">
								<a class="ctwg-recent-image" href="https://roic.io/2018/03/12/membership/">
					<img width="150" height="150" src="https://roic.io/wp-content/uploads/2018/03/pexels-photo-933142-150x150.jpeg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" title="" srcset="https://roic.io/wp-content/uploads/2018/03/pexels-photo-933142-150x150.jpeg 150w, https://roic.io/wp-content/uploads/2018/03/pexels-photo-933142-300x300.jpeg 300w, https://roic.io/wp-content/uploads/2018/03/pexels-photo-933142-100x100.jpeg 100w, https://roic.io/wp-content/uploads/2018/03/pexels-photo-933142-400x400.jpeg 400w" sizes="(max-width: 150px) 100vw, 150px">				</a>
								<div class="ctwg-recent-body">
					<div class="ctwg-recent-title">
						<a href="https://roic.io/2018/03/12/membership/">Membership</a>
					</div>
					<div class="ctwg-recent-meta">March 12, 2018</div>
				</div>
			</div>
						<div class="ctwg-recent-item ctwg-has-thumbnail">
								<a class="ctwg-recent-image" href="https://roic.io/2018/03/10/teach-the-world-online/">
					<img width="150" height="150" src="https://roic.io/wp-content/uploads/2018/03/pexels-photo-374016-1-150x150.jpeg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" title="" srcset="https://roic.io/wp-content/uploads/2018/03/pexels-photo-374016-1-150x150.jpeg 150w, https://roic.io/wp-content/uploads/2018/03/pexels-photo-374016-1-300x300.jpeg 300w, https://roic.io/wp-content/uploads/2018/03/pexels-photo-374016-1-100x100.jpeg 100w, https://roic.io/wp-content/uploads/2018/03/pexels-photo-374016-1-400x400.jpeg 400w" sizes="(max-width: 150px) 100vw, 150px">				</a>
								<div class="ctwg-recent-body">
					<div class="ctwg-recent-title">
						<a href="https://roic.io/2018/03/10/teach-the-world-online/">Teach the world online</a>
					</div>
					<div class="ctwg-recent-meta">March 10, 2018</div>
				</div>
			</div>
					</div>
		</div></div></div><div class="column col-md-4"><div class="subfooter-column"><div id="ctwg-social-4" class="widget ctwg-social"><div class="widget-title heading">Social Links</div>		<div class="ctwg-social" id="ctwg-social-4">
									<a class="ctwg-social-link ctwg-social-facebook" href="https://www.facebook.com/ROIC-314677989056705/?notif_id=1521192776104582&amp;notif_t=page_admin&amp;ref=notif" title="Facebook">
				<span class="ctwg-social-icon"></span>
			</a>
									<a class="ctwg-social-link ctwg-social-twitter" href="https://www.facebook.com/ROIC-314677989056705/?notif_id=1521192776104582&amp;notif_t=page_admin&amp;ref=notif" title="Twitter">
				<span class="ctwg-social-icon"></span>
			</a>
															<a class="ctwg-social-link ctwg-social-youtube" href="https://www.facebook.com/ROIC-314677989056705/?notif_id=1521192776104582&amp;notif_t=page_admin&amp;ref=notif" title="YouTube">
				<span class="ctwg-social-icon"></span>
			</a>
																				</div>
		</div><div id="text-7" class="widget widget_text">			<div class="textwidget">
</div>
		</div></div></div></div><div class="clear"></div>	</div>
</section>
@endsection
