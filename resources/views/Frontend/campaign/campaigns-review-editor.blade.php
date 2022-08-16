@extends('Frontend.layouts.Dashboard.index')
@section('frontTitle', 'Campaigns | Campaigns Review')
@section('frontMainContent')
<div class="row">
	<div class="col-lg-3">
		<div class="under-review-cards">
			<div class="card" data-bs-toggle="modal" data-bs-target="#exampleModal">
			  <div class="card-body">
			  	<h6 class="card-header-small-title">New Account</h6>
			    <h3 class="card-title">ExampleBiz LLC.
			    	<span class="ml-1">
			    		<svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.00016 0.416992C4.70649 0.416992 2.8335 2.28998 2.8335 4.58366V7.70866H2.8514C1.3197 8.93148 0.333496 10.8104 0.333496 12.917C0.333496 16.5915 3.32566 19.5837 7.00016 19.5837C10.6747 19.5837 13.6668 16.5915 13.6668 12.917C13.6668 10.8104 12.6806 8.93148 11.1489 7.70866H11.1668V4.58366C11.1668 2.28998 9.29384 0.416992 7.00016 0.416992ZM7.00016 1.66699C8.61815 1.66699 9.91683 2.96567 9.91683 4.58366V6.93229C9.0343 6.50015 8.04679 6.25033 7.00016 6.25033C5.95354 6.25033 4.96603 6.50015 4.0835 6.93229V4.58366C4.0835 2.96567 5.38217 1.66699 7.00016 1.66699ZM7.00016 7.50033C9.99911 7.50033 12.4168 9.91805 12.4168 12.917C12.4168 15.9159 9.99911 18.3337 7.00016 18.3337C4.00121 18.3337 1.5835 15.9159 1.5835 12.917C1.5835 9.91805 4.00121 7.50033 7.00016 7.50033ZM7.00016 10.0003C6.52263 10.0017 6.06007 10.1671 5.68992 10.4688C5.31978 10.7706 5.06453 11.1903 4.9669 11.6577C4.86927 12.1252 4.9352 12.612 5.15364 13.0366C5.37208 13.4613 5.72977 13.798 6.16683 13.9904V15.417C6.16683 15.8774 6.53975 16.2503 7.00016 16.2503C7.46058 16.2503 7.8335 15.8774 7.8335 15.417V13.992C8.27153 13.8002 8.63025 13.4635 8.84942 13.0385C9.06859 12.6135 9.13488 12.126 9.03715 11.6579C8.93943 11.1898 8.68364 10.7696 8.31273 10.4677C7.94182 10.1659 7.47836 10.0009 7.00016 10.0003Z" fill="#313131"/>
						</svg>
					</span>
			    </h3>
			    <h3 class="card-subtitle weight-400 yellow-dot-before p-0 m-0">Under Review</h3>
			  </div>
			</div>
			<button class="btn full-width right-icon mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal1">
				Complete Payment Set Up
				<span class="icon-right">
					<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.03527 0.743652C8.91088 0.743683 8.78934 0.780822 8.68618 0.850319C8.58302 0.919816 8.50295 1.01851 8.45619 1.13377C8.40944 1.24904 8.39814 1.37563 8.42374 1.49735C8.44934 1.61907 8.51067 1.73039 8.59988 1.81706L13.3663 6.5835H1.12511C1.04229 6.58232 0.960066 6.59763 0.883211 6.62851C0.806355 6.65939 0.736405 6.70524 0.677424 6.7634C0.618443 6.82155 0.571608 6.89084 0.53964 6.96726C0.507673 7.04367 0.491211 7.12567 0.491211 7.2085C0.491211 7.29132 0.507673 7.37333 0.53964 7.44974C0.571608 7.52615 0.618443 7.59544 0.677424 7.6536C0.736405 7.71175 0.806355 7.7576 0.883211 7.78848C0.960066 7.81937 1.04229 7.83467 1.12511 7.8335H13.3663L8.59988 12.5999C8.5399 12.6575 8.49201 12.7265 8.45903 12.8028C8.42604 12.8792 8.40861 12.9613 8.40776 13.0445C8.40692 13.1276 8.42267 13.2101 8.4541 13.2871C8.48553 13.3641 8.53201 13.434 8.59081 13.4928C8.64961 13.5516 8.71955 13.5981 8.79653 13.6295C8.87352 13.6609 8.956 13.6767 9.03915 13.6758C9.1223 13.675 9.20444 13.6576 9.28077 13.6246C9.3571 13.5916 9.42608 13.5437 9.48367 13.4837L15.317 7.65039C15.4342 7.53318 15.5 7.37423 15.5 7.2085C15.5 7.04276 15.4342 6.88382 15.317 6.7666L9.48367 0.933268C9.42542 0.873274 9.35571 0.82558 9.27869 0.793009C9.20167 0.760439 9.11889 0.743656 9.03527 0.743652Z" fill="#1C1C1C"/>
					</svg>
				</span>
			</button>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="center-main-content">
			<form>
				<div class="mb-4">
				    <label class="form-label tool-tip">Campaign ID
				    	<span class="tool-tip" title="Tooltip on top">
				    		<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#313131" stroke-width="1.5"/>
							<path d="M7.00008 7.6087C7.00008 6.17571 8.35213 5 10 5C11.6479 5 13 6.17571 13 7.6087C13 8.98221 12.1793 9.7403 11.5879 10.1444L11.5759 10.1526C11.2864 10.3503 11.0775 10.4931 10.9561 10.6369C10.833 10.7827 10.75 10.9334 10.75 11.3043C10.7514 11.3908 10.7331 11.4766 10.696 11.5568C10.659 11.637 10.6039 11.71 10.5342 11.7715C10.4644 11.833 10.3812 11.8819 10.2895 11.9153C10.1978 11.9486 10.0994 11.9658 10 11.9658C9.90065 11.9658 9.80224 11.9486 9.71055 11.9153C9.61886 11.8819 9.53571 11.833 9.46592 11.7715C9.39614 11.71 9.34112 11.637 9.30406 11.5568C9.267 11.4766 9.24864 11.3908 9.25005 11.3043C9.25005 10.7125 9.4483 10.219 9.74711 9.86498C10.0459 9.51096 10.3954 9.30081 10.6621 9.11855C11.1957 8.75402 11.5 8.62648 11.5 7.6087C11.5 6.88081 10.8371 6.30435 10 6.30435C9.16298 6.30435 8.50006 6.88081 8.50006 7.6087V7.82609C8.50146 7.91251 8.4831 7.99831 8.44604 8.07851C8.40898 8.1587 8.35396 8.23169 8.28418 8.29324C8.2144 8.35479 8.13124 8.40366 8.03955 8.43701C7.94786 8.47037 7.84946 8.48755 7.75007 8.48755C7.65067 8.48755 7.55227 8.47037 7.46058 8.43701C7.36889 8.40366 7.28574 8.35479 7.21595 8.29324C7.14617 8.23169 7.09115 8.1587 7.05409 8.07851C7.01703 7.99831 6.99867 7.91251 7.00008 7.82609V7.6087Z" fill="#313131"/>
							<path d="M9.29294 13.5156C9.48047 13.3525 9.73482 13.2609 10 13.2609C10.2653 13.2609 10.5196 13.3525 10.7071 13.5156C10.8947 13.6786 11 13.8998 11 14.1304C11 14.3611 10.8947 14.5822 10.7071 14.7453C10.5196 14.9084 10.2653 15 10 15C9.73482 15 9.48047 14.9084 9.29294 14.7453C9.10541 14.5822 9.00005 14.3611 9.00005 14.1304C9.00005 13.8998 9.10541 13.6786 9.29294 13.5156Z" fill="#313131"/>
							</svg>
				    	</span>
				    </label>
				    <input type="email" class="form-control" value="#1234567890">
			  	</div>
			  	<div class="mb-4">
				    <label class="form-label tool-tip">campaign or Company Title
				    	<span class="tool-tip" title="Tooltip on top">
				    		<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#313131" stroke-width="1.5"/>
							<path d="M7.00008 7.6087C7.00008 6.17571 8.35213 5 10 5C11.6479 5 13 6.17571 13 7.6087C13 8.98221 12.1793 9.7403 11.5879 10.1444L11.5759 10.1526C11.2864 10.3503 11.0775 10.4931 10.9561 10.6369C10.833 10.7827 10.75 10.9334 10.75 11.3043C10.7514 11.3908 10.7331 11.4766 10.696 11.5568C10.659 11.637 10.6039 11.71 10.5342 11.7715C10.4644 11.833 10.3812 11.8819 10.2895 11.9153C10.1978 11.9486 10.0994 11.9658 10 11.9658C9.90065 11.9658 9.80224 11.9486 9.71055 11.9153C9.61886 11.8819 9.53571 11.833 9.46592 11.7715C9.39614 11.71 9.34112 11.637 9.30406 11.5568C9.267 11.4766 9.24864 11.3908 9.25005 11.3043C9.25005 10.7125 9.4483 10.219 9.74711 9.86498C10.0459 9.51096 10.3954 9.30081 10.6621 9.11855C11.1957 8.75402 11.5 8.62648 11.5 7.6087C11.5 6.88081 10.8371 6.30435 10 6.30435C9.16298 6.30435 8.50006 6.88081 8.50006 7.6087V7.82609C8.50146 7.91251 8.4831 7.99831 8.44604 8.07851C8.40898 8.1587 8.35396 8.23169 8.28418 8.29324C8.2144 8.35479 8.13124 8.40366 8.03955 8.43701C7.94786 8.47037 7.84946 8.48755 7.75007 8.48755C7.65067 8.48755 7.55227 8.47037 7.46058 8.43701C7.36889 8.40366 7.28574 8.35479 7.21595 8.29324C7.14617 8.23169 7.09115 8.1587 7.05409 8.07851C7.01703 7.99831 6.99867 7.91251 7.00008 7.82609V7.6087Z" fill="#313131"/>
							<path d="M9.29294 13.5156C9.48047 13.3525 9.73482 13.2609 10 13.2609C10.2653 13.2609 10.5196 13.3525 10.7071 13.5156C10.8947 13.6786 11 13.8998 11 14.1304C11 14.3611 10.8947 14.5822 10.7071 14.7453C10.5196 14.9084 10.2653 15 10 15C9.73482 15 9.48047 14.9084 9.29294 14.7453C9.10541 14.5822 9.00005 14.3611 9.00005 14.1304C9.00005 13.8998 9.10541 13.6786 9.29294 13.5156Z" fill="#313131"/>
							</svg>
				    	</span>
				    </label>
				    <input type="email" class="form-control" value="examplebiz.com">
			  	</div>
			  	<div class="mb-4">
			  		<label class="form-label tool-tip">campaign Video
				    	<span class="tool-tip" title="Tooltip on top">
				    		<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#313131" stroke-width="1.5"/>
							<path d="M7.00008 7.6087C7.00008 6.17571 8.35213 5 10 5C11.6479 5 13 6.17571 13 7.6087C13 8.98221 12.1793 9.7403 11.5879 10.1444L11.5759 10.1526C11.2864 10.3503 11.0775 10.4931 10.9561 10.6369C10.833 10.7827 10.75 10.9334 10.75 11.3043C10.7514 11.3908 10.7331 11.4766 10.696 11.5568C10.659 11.637 10.6039 11.71 10.5342 11.7715C10.4644 11.833 10.3812 11.8819 10.2895 11.9153C10.1978 11.9486 10.0994 11.9658 10 11.9658C9.90065 11.9658 9.80224 11.9486 9.71055 11.9153C9.61886 11.8819 9.53571 11.833 9.46592 11.7715C9.39614 11.71 9.34112 11.637 9.30406 11.5568C9.267 11.4766 9.24864 11.3908 9.25005 11.3043C9.25005 10.7125 9.4483 10.219 9.74711 9.86498C10.0459 9.51096 10.3954 9.30081 10.6621 9.11855C11.1957 8.75402 11.5 8.62648 11.5 7.6087C11.5 6.88081 10.8371 6.30435 10 6.30435C9.16298 6.30435 8.50006 6.88081 8.50006 7.6087V7.82609C8.50146 7.91251 8.4831 7.99831 8.44604 8.07851C8.40898 8.1587 8.35396 8.23169 8.28418 8.29324C8.2144 8.35479 8.13124 8.40366 8.03955 8.43701C7.94786 8.47037 7.84946 8.48755 7.75007 8.48755C7.65067 8.48755 7.55227 8.47037 7.46058 8.43701C7.36889 8.40366 7.28574 8.35479 7.21595 8.29324C7.14617 8.23169 7.09115 8.1587 7.05409 8.07851C7.01703 7.99831 6.99867 7.91251 7.00008 7.82609V7.6087Z" fill="#313131"/>
							<path d="M9.29294 13.5156C9.48047 13.3525 9.73482 13.2609 10 13.2609C10.2653 13.2609 10.5196 13.3525 10.7071 13.5156C10.8947 13.6786 11 13.8998 11 14.1304C11 14.3611 10.8947 14.5822 10.7071 14.7453C10.5196 14.9084 10.2653 15 10 15C9.73482 15 9.48047 14.9084 9.29294 14.7453C9.10541 14.5822 9.00005 14.3611 9.00005 14.1304C9.00005 13.8998 9.10541 13.6786 9.29294 13.5156Z" fill="#313131"/>
							</svg>
				    	</span>
				    </label>
				    <div class="dropzone dropzone-default" id="kt_dropzone_1">
	                    <div class="dropzone-msg dz-message needsclick">
	                       <svg width="80" height="53" viewBox="0 0 80 53" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M40 0.666504C27.5167 0.666504 17.2168 10.1832 15.9668 22.3332H15C6.73333 22.3332 0 29.0665 0 37.3332C0 45.5998 6.73333 52.3332 15 52.3332H32.9329C32.6496 51.5498 32.5 50.7165 32.5 49.8332V47.3332H15C9.48333 47.3332 5 42.8498 5 37.3332C5 31.8165 9.48333 27.3332 15 27.3332H18.3333C19.7167 27.3332 20.8333 26.2165 20.8333 24.8332C20.8333 14.2665 29.4333 5.6665 40 5.6665C50.5667 5.6665 59.1667 14.2665 59.1667 24.8332C59.1667 26.2165 60.2833 27.3332 61.6667 27.3332H65C70.5167 27.3332 75 31.8165 75 37.3332C75 42.8498 70.5167 47.3332 65 47.3332H47.5V49.8332C47.5 50.7165 47.3504 51.5498 47.0671 52.3332H65C73.2667 52.3332 80 45.5998 80 37.3332C80 29.0665 73.2667 22.3332 65 22.3332H64.0332C62.7832 10.1832 52.4833 0.666504 40 0.666504ZM39.8763 19.0031C39.2863 19.0327 38.7258 19.2703 38.2943 19.6737L25.7943 31.3403C25.5418 31.561 25.3363 31.8301 25.19 32.1318C25.0437 32.4335 24.9595 32.7615 24.9425 33.0964C24.9256 33.4313 24.9761 33.7661 25.0912 34.0811C25.2063 34.396 25.3836 34.6846 25.6124 34.9296C25.8413 35.1746 26.1171 35.3711 26.4235 35.5074C26.7298 35.6437 27.0605 35.7169 27.3957 35.7228C27.7309 35.7287 28.0639 35.6671 28.3749 35.5416C28.6859 35.4162 28.9684 35.2295 29.2057 34.9927L37.5 27.255V49.8332C37.4953 50.1644 37.5565 50.4934 37.6801 50.8008C37.8036 51.1082 37.987 51.388 38.2196 51.6239C38.4522 51.8598 38.7294 52.0472 39.035 52.1751C39.3407 52.3029 39.6687 52.3688 40 52.3688C40.3313 52.3688 40.6593 52.3029 40.965 52.1751C41.2706 52.0472 41.5478 51.8598 41.7804 51.6239C42.013 51.388 42.1964 51.1082 42.3199 50.8008C42.4435 50.4934 42.5047 50.1644 42.5 49.8332V27.255L50.7943 34.9927C51.0316 35.2295 51.3141 35.4162 51.6251 35.5416C51.9361 35.6671 52.2691 35.7287 52.6043 35.7228C52.9395 35.7169 53.2702 35.6437 53.5765 35.5074C53.8829 35.3711 54.1587 35.1746 54.3876 34.9296C54.6164 34.6846 54.7937 34.396 54.9088 34.0811C55.0239 33.7661 55.0744 33.4313 55.0575 33.0964C55.0405 32.7615 54.9563 32.4335 54.81 32.1318C54.6637 31.8301 54.4582 31.561 54.2057 31.3403L41.7057 19.6737C41.4612 19.4451 41.1733 19.268 40.859 19.1528C40.5448 19.0376 40.2106 18.9867 39.8763 19.0031Z" fill="#BFBFBF"/>
							</svg>
	                    </div>
	                 </div>
			  	</div>
			  	<div class="mb-4 mt-5">
				    <label class="form-label tool-tip">campaign Investment Terms
				    	<span class="tool-tip" title="Tooltip on top">
				    		<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#313131" stroke-width="1.5"/>
							<path d="M7.00008 7.6087C7.00008 6.17571 8.35213 5 10 5C11.6479 5 13 6.17571 13 7.6087C13 8.98221 12.1793 9.7403 11.5879 10.1444L11.5759 10.1526C11.2864 10.3503 11.0775 10.4931 10.9561 10.6369C10.833 10.7827 10.75 10.9334 10.75 11.3043C10.7514 11.3908 10.7331 11.4766 10.696 11.5568C10.659 11.637 10.6039 11.71 10.5342 11.7715C10.4644 11.833 10.3812 11.8819 10.2895 11.9153C10.1978 11.9486 10.0994 11.9658 10 11.9658C9.90065 11.9658 9.80224 11.9486 9.71055 11.9153C9.61886 11.8819 9.53571 11.833 9.46592 11.7715C9.39614 11.71 9.34112 11.637 9.30406 11.5568C9.267 11.4766 9.24864 11.3908 9.25005 11.3043C9.25005 10.7125 9.4483 10.219 9.74711 9.86498C10.0459 9.51096 10.3954 9.30081 10.6621 9.11855C11.1957 8.75402 11.5 8.62648 11.5 7.6087C11.5 6.88081 10.8371 6.30435 10 6.30435C9.16298 6.30435 8.50006 6.88081 8.50006 7.6087V7.82609C8.50146 7.91251 8.4831 7.99831 8.44604 8.07851C8.40898 8.1587 8.35396 8.23169 8.28418 8.29324C8.2144 8.35479 8.13124 8.40366 8.03955 8.43701C7.94786 8.47037 7.84946 8.48755 7.75007 8.48755C7.65067 8.48755 7.55227 8.47037 7.46058 8.43701C7.36889 8.40366 7.28574 8.35479 7.21595 8.29324C7.14617 8.23169 7.09115 8.1587 7.05409 8.07851C7.01703 7.99831 6.99867 7.91251 7.00008 7.82609V7.6087Z" fill="#313131"/>
							<path d="M9.29294 13.5156C9.48047 13.3525 9.73482 13.2609 10 13.2609C10.2653 13.2609 10.5196 13.3525 10.7071 13.5156C10.8947 13.6786 11 13.8998 11 14.1304C11 14.3611 10.8947 14.5822 10.7071 14.7453C10.5196 14.9084 10.2653 15 10 15C9.73482 15 9.48047 14.9084 9.29294 14.7453C9.10541 14.5822 9.00005 14.3611 9.00005 14.1304C9.00005 13.8998 9.10541 13.6786 9.29294 13.5156Z" fill="#313131"/>
							</svg>
				    	</span>
				    </label>
				    <div class="row">
				    	<div class="col-md-6 mb-4">
				    		<div class="information-box">
				    			<div class="row">
				    				<div class="col-md-5">
				    					<span class="text">minimum investment</span>
				    				</div>
				    				<div class="col-md-7 text-end">
				    					<span class="text-bold">$000000</span>
				    				</div>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="col-md-6 mb-4">
				    		<div class="information-box">
				    			<div class="row">
				    				<div class="col-md-5">
				    					<span class="text">maximum investment</span>
				    				</div>
				    				<div class="col-md-7 text-end">
				    					<span class="text-bold">$000000</span>
				    				</div>
				    			</div>
				    		</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col-md-6 mb-4">
				    		<div class="information-box">
				    			<div class="row">
				    				<div class="col-md-5">
				    					<span class="text">minimum Funding Goal</span>
				    				</div>
				    				<div class="col-md-7 text-end">
				    					<span class="text-bold">$000000</span>
				    				</div>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="col-md-6 mb-4">
				    		<div class="information-box">
				    			<div class="row">
				    				<div class="col-md-5">
				    					<span class="text">maximum Funding Goal</span>
				    				</div>
				    				<div class="col-md-7 text-end">
				    					<span class="text-bold">$000000</span>
				    				</div>
				    			</div>
				    		</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col-md-6 mb-4">
				    		<div class="information-box">
				    			<div class="row">
				    				<div class="col-md-5">
				    					<span class="text">Valuation Cap</span>
				    				</div>
				    				<div class="col-md-7 text-end">
				    					<span class="text-bold">$000000</span>
				    				</div>
				    			</div>
				    		</div>
				    	</div>
				    	<div class="col-md-6 mb-4">
				    		<div class="information-box">
				    			<div class="row">
				    				<div class="col-md-5">
				    					<span class="text">Discount</span>
				    				</div>
				    				<div class="col-md-7 text-end">
				    					<span class="text-bold">000%</span>
				    				</div>
				    			</div>
				    		</div>
				    	</div>
				    </div>
			  	</div>
				<div class="mb-4 mt-4">
					<label class="form-label tool-tip">campaign Listing
				    	<span class="tool-tip" title="Tooltip on top">
				    		<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.75" y="0.75" width="18.5" height="18.5" rx="4.25" stroke="#313131" stroke-width="1.5"/>
							<path d="M7.00008 7.6087C7.00008 6.17571 8.35213 5 10 5C11.6479 5 13 6.17571 13 7.6087C13 8.98221 12.1793 9.7403 11.5879 10.1444L11.5759 10.1526C11.2864 10.3503 11.0775 10.4931 10.9561 10.6369C10.833 10.7827 10.75 10.9334 10.75 11.3043C10.7514 11.3908 10.7331 11.4766 10.696 11.5568C10.659 11.637 10.6039 11.71 10.5342 11.7715C10.4644 11.833 10.3812 11.8819 10.2895 11.9153C10.1978 11.9486 10.0994 11.9658 10 11.9658C9.90065 11.9658 9.80224 11.9486 9.71055 11.9153C9.61886 11.8819 9.53571 11.833 9.46592 11.7715C9.39614 11.71 9.34112 11.637 9.30406 11.5568C9.267 11.4766 9.24864 11.3908 9.25005 11.3043C9.25005 10.7125 9.4483 10.219 9.74711 9.86498C10.0459 9.51096 10.3954 9.30081 10.6621 9.11855C11.1957 8.75402 11.5 8.62648 11.5 7.6087C11.5 6.88081 10.8371 6.30435 10 6.30435C9.16298 6.30435 8.50006 6.88081 8.50006 7.6087V7.82609C8.50146 7.91251 8.4831 7.99831 8.44604 8.07851C8.40898 8.1587 8.35396 8.23169 8.28418 8.29324C8.2144 8.35479 8.13124 8.40366 8.03955 8.43701C7.94786 8.47037 7.84946 8.48755 7.75007 8.48755C7.65067 8.48755 7.55227 8.47037 7.46058 8.43701C7.36889 8.40366 7.28574 8.35479 7.21595 8.29324C7.14617 8.23169 7.09115 8.1587 7.05409 8.07851C7.01703 7.99831 6.99867 7.91251 7.00008 7.82609V7.6087Z" fill="#313131"/>
							<path d="M9.29294 13.5156C9.48047 13.3525 9.73482 13.2609 10 13.2609C10.2653 13.2609 10.5196 13.3525 10.7071 13.5156C10.8947 13.6786 11 13.8998 11 14.1304C11 14.3611 10.8947 14.5822 10.7071 14.7453C10.5196 14.9084 10.2653 15 10 15C9.73482 15 9.48047 14.9084 9.29294 14.7453C9.10541 14.5822 9.00005 14.3611 9.00005 14.1304C9.00005 13.8998 9.10541 13.6786 9.29294 13.5156Z" fill="#313131"/>
							</svg>
				    	</span>
				    </label>
					<textarea class="form-control" placeholder="ExampleBiz LLC is all about..."></textarea>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      	<h3 class="weight-400 mb-5">Revision Notes by:
      		<span class="weight-700">@username</span>
      		<span class="icon">
      			<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M3.46891 0.125C1.60853 0.125 0.0834961 1.65003 0.0834961 3.51042V11.8438V14.9871C0.0834961 16.0035 1.32824 16.6381 2.15055 16.0409C2.15089 16.0409 2.15123 16.0409 2.15157 16.0409L4.40173 14.4042C4.83087 15.7821 6.12221 16.7917 7.63558 16.7917H14.1521L18.8488 20.2076C18.8491 20.2076 18.8494 20.2076 18.8498 20.2076C19.6721 20.8047 20.9168 20.1702 20.9168 19.1537V16.0104V7.67708C20.9168 5.8167 19.3918 4.29167 17.5314 4.29167H16.7502V3.51042C16.7502 1.65003 15.2251 0.125 13.3647 0.125H3.46891ZM3.46891 1.6875H13.3647C14.3804 1.6875 15.1877 2.49476 15.1877 3.51042V9.23958C15.1877 10.2552 14.3804 11.0625 13.3647 11.0625H6.59391C6.42869 11.0625 6.26771 11.1148 6.13411 11.212L1.646 14.4764V11.8438V3.51042C1.646 2.49476 2.45326 1.6875 3.46891 1.6875ZM16.7502 5.85417H17.5314C18.5471 5.85417 19.3543 6.66143 19.3543 7.67708V16.0104V18.6431L14.8662 15.3787C14.7326 15.2815 14.5716 15.2291 14.4064 15.2292H7.63558C6.61992 15.2292 5.81266 14.4219 5.81266 13.4063V13.3778L6.84823 12.625H13.3647C15.2251 12.625 16.7502 11.1 16.7502 9.23958V5.85417Z" fill="black"/>
				</svg>
      		</span>
      	</h3>
      	<ul class="list">
      		<li class="mb-3"><span class="number">01</span>
      			<div class="form-check mb-3">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
				  <label class="form-check-label" for="flexCheckDefault1">
				    The product outline needs an improvement with the descriptive summary.
				  </label>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel mi at, sollicitudin rhoncus quam. Praesent elementum, augue vitae aliquam tempus, ligula turpis gravida lorem, vitae blandit neque tellus in arcu. Morbi fermentum, enim a ultricies pharetra, velit ligula dignissim massa, dignissim commodo libero urna vel tellus. Cras in hendrerit erat, ut commodona.</p>
      		</li>
      		<li class="mb-3"><span class="number">02</span>
      			<div class="form-check mb-3">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
				  <label class="form-check-label" for="flexCheckDefault2">
				    The product outline needs an improvement with the descriptive summary.
				  </label>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel mi at, sollicitudin rhoncus quam. Praesent elementum, augue vitae aliquam tempus, ligula turpis gravida lorem, vitae blandit neque tellus in arcu. Morbi fermentum, enim a ultricies pharetra, velit ligula dignissim massa, dignissim commodo libero urna vel tellus. Cras in hendrerit erat, ut commodona.</p>
      		</li>
      		<li class="mb-3"><span class="number">03</span>
      			<div class="form-check mb-3">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
				  <label class="form-check-label" for="flexCheckDefault3">
				    The product outline needs an improvement with the descriptive summary.
				  </label>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel mi at, sollicitudin rhoncus quam. Praesent elementum, augue vitae aliquam tempus, ligula turpis gravida lorem, vitae blandit neque tellus in arcu. Morbi fermentum, enim a ultricies pharetra, velit ligula dignissim massa, dignissim commodo libero urna vel tellus. Cras in hendrerit erat, ut commodona.</p>
      		</li>
      		<li class="mb-3"><span class="number">04</span>
      			<div class="form-check mb-3">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
				  <label class="form-check-label" for="flexCheckDefault4">
				    The product outline needs an improvement with the descriptive summary.
				  </label>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel mi at, sollicitudin rhoncus quam. Praesent elementum, augue vitae aliquam tempus, ligula turpis gravida lorem, vitae blandit neque tellus in arcu. Morbi fermentum, enim a ultricies pharetra, velit ligula dignissim massa, dignissim commodo libero urna vel tellus. Cras in hendrerit erat, ut commodona.</p>
      		</li>
      		<li class="mb-3"><span class="number">05</span>
      			<div class="form-check mb-3">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
				  <label class="form-check-label" for="flexCheckDefault5">
				    The product outline needs an improvement with the descriptive summary.
				  </label>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel mi at, sollicitudin rhoncus quam. Praesent elementum, augue vitae aliquam tempus, ligula turpis gravida lorem, vitae blandit neque tellus in arcu. Morbi fermentum, enim a ultricies pharetra, velit ligula dignissim massa, dignissim commodo libero urna vel tellus. Cras in hendrerit erat, ut commodona.</p>
      		</li>
      	</ul>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      	<h3 class="weight-400 mb-2">Test The Waters Before Launching Your Campaign</h3>
      	<h4 class="weight-700">This is a subtitle about this topic</h4>
      	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel!</p>

      	<ul class="list">
      		<li class="mb-3"><span class="number">01</span>
      			<h4 class="weight-700">Another title can go here or below</h4>
				<p class="padding-left-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel mi at, sollicitudin rhoncus quam. Praesent elementum, augue vitae aliquam tempus, ligula turpis gravida lorem, vitae blandit neque tellus in arcu. Morbi fermentum, enim a ultricies pharetra, velit ligula dignissim massa, dignissim commodo libero urna vel tellus. Cras in hendrerit erat, ut commodona.</p>
      		</li>
      		<li class="mb-3"><span class="number">02</span>
      			<h4 class="weight-700">Another title can go here or below</h4>
				<p class="padding-left-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel mi at, sollicitudin rhoncus quam. Praesent elementum, augue vitae aliquam tempus, ligula turpis gravida lorem, vitae blandit neque tellus in arcu. Morbi fermentum, enim a ultricies pharetra, velit ligula dignissim massa, dignissim commodo libero urna vel tellus. Cras in hendrerit erat, ut commodona.</p>
      		</li>
      		<li class="mb-3"><span class="number">03</span>
      			<h4 class="weight-700">Another title can go here or below</h4>
				<p class="padding-left-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel mi at, sollicitudin rhoncus quam. Praesent elementum, augue vitae aliquam tempus, ligula turpis gravida lorem, vitae blandit neque tellus in arcu. Morbi fermentum, enim a ultricies pharetra, velit ligula dignissim massa, dignissim commodo libero urna vel tellus. Cras in hendrerit erat, ut commodona.</p>
      		</li>
      		<li class="mb-3"><span class="number">04</span>
      			<h4 class="weight-700">Another title can go here or below</h4>
				<p class="padding-left-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel mi at, sollicitudin rhoncus quam. Praesent elementum, augue vitae aliquam tempus, ligula turpis gravida lorem, vitae blandit neque tellus in arcu. Morbi fermentum, enim a ultricies pharetra, velit ligula dignissim massa, dignissim commodo libero urna vel tellus. Cras in hendrerit erat, ut commodona.</p>
      		</li>
      		<li class="mb-3"><span class="number">05</span>
      			<h4 class="weight-700">Another title can go here or below</h4>
				<p class="padding-left-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lacus risus, feugiat in justo et, auctor pulvinar urna. Morbi quis tincidunt est. Phasellus lacinia, sapien sit amet auctor ullamcorper, augue eros bibendum purus, et hendrerit nisi arcu quis justo. Phasellus gravida dolor id lobortis finibus. Nulla lorem nulla, bibendum nec finibus eget, porta finibus sapien. Suspendisse felis tellus, sodales vel mi at, sollicitudin rhoncus quam. Praesent elementum, augue vitae aliquam tempus, ligula turpis gravida lorem, vitae blandit neque tellus in arcu. Morbi fermentum, enim a ultricies pharetra, velit ligula dignissim massa, dignissim commodo libero urna vel tellus. Cras in hendrerit erat, ut commodona.</p>
      		</li>
      	</ul>

      	<div class="botton-btns">
      		<button class="btn fixed-width green-btn mr-5 small-btn mr-3 mb-2">
				<span class="mr-3">
					<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.0788 0.291647C15.9835 0.292437 15.8897 0.314984 15.8045 0.357565L0.80454 7.85757C0.708138 7.90576 0.625835 7.97806 0.565624 8.06745C0.505412 8.15684 0.469337 8.26028 0.460902 8.36773C0.452467 8.47518 0.471957 8.58298 0.517482 8.68067C0.563007 8.77837 0.633018 8.86263 0.720718 8.92527L3.47137 10.8906L4.65708 14.4477C4.69316 14.5559 4.75815 14.6522 4.84502 14.7261C4.93188 14.8 5.03731 14.8487 5.14989 14.867C5.26247 14.8853 5.3779 14.8724 5.48368 14.8298C5.58946 14.7871 5.68157 14.7164 5.75002 14.6251L6.63055 13.4508L10.7158 16.422C10.7953 16.4799 10.8873 16.5183 10.9844 16.5339C11.0814 16.5496 11.1808 16.5421 11.2745 16.5121C11.3681 16.4822 11.4533 16.4305 11.5233 16.3614C11.5932 16.2923 11.6459 16.2077 11.6769 16.1144L16.6769 1.1144C16.7084 1.02002 16.7169 0.919501 16.7017 0.821185C16.6865 0.722868 16.648 0.6296 16.5895 0.549134C16.531 0.468667 16.4542 0.403325 16.3653 0.358541C16.2765 0.313757 16.1783 0.290824 16.0788 0.291647ZM14.3747 4.06688L10.7606 14.9083L7.4061 12.4694L14.3747 4.06688ZM11.1699 4.07257L3.98244 9.71954L2.29136 8.51105L11.1699 4.07257ZM11.9129 5.07762L6.02427 12.1789C6.02345 12.1797 6.02264 12.1805 6.02182 12.1813L6.01938 12.1846C6.01296 12.1923 6.00671 12.2001 6.00067 12.2082C5.99393 12.2167 5.98742 12.2253 5.98113 12.2342L5.466 12.9202L4.73276 10.7189L11.9129 5.07762Z" fill="#1C1C1C"/>
					</svg>
				</span>Publish For Soft Launch
			</button>
			<button class="btn fixed-width mr-5 small-btn mb-2">
				<span class="mr-3">
					<svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10 0.333374C6.87917 0.333374 4.3042 2.71254 3.9917 5.75004H3.75C1.68333 5.75004 0 7.43337 0 9.50004C0 11.5667 1.68333 13.25 3.75 13.25H5.40039L5.81706 12H3.75C2.37083 12 1.25 10.8792 1.25 9.50004C1.25 8.12087 2.37083 7.00004 3.75 7.00004H4.58333C4.92917 7.00004 5.20833 6.72087 5.20833 6.37504C5.20833 3.73337 7.35833 1.58337 10 1.58337C12.6417 1.58337 14.7917 3.73337 14.7917 6.37504C14.7917 6.72087 15.0708 7.00004 15.4167 7.00004H16.25C17.6292 7.00004 18.75 8.12087 18.75 9.50004C18.75 10.8792 17.6292 12 16.25 12H15.7129C15.5337 12.4584 15.1795 12.8337 14.7087 13.0295L14.1789 13.25H16.25C18.3167 13.25 20 11.5667 20 9.50004C20 7.43337 18.3167 5.75004 16.25 5.75004H16.0083C15.6958 2.71254 13.1208 0.333374 10 0.333374ZM7.05811 7.83663C6.8926 7.81899 6.72525 7.87256 6.59993 7.98881C6.43243 8.14464 6.37118 8.38452 6.44368 8.6016L7.02718 10.3529C7.09468 10.5554 7.26682 10.7048 7.4764 10.7419L10.7381 11.3352L7.4764 11.9292C7.26682 11.9667 7.09428 12.1157 7.02637 12.3182L6.44287 14.0695C6.37037 14.2866 6.43162 14.5265 6.59912 14.6823C6.7087 14.7844 6.85126 14.8378 6.99626 14.8378C7.07209 14.8378 7.14795 14.8234 7.22087 14.793L14.2261 11.8739C14.7048 11.6743 14.7048 10.9968 14.2261 10.7972L7.22087 7.87813C7.16784 7.85595 7.11327 7.84251 7.05811 7.83663Z" fill="#1C1C1C"/>
					</svg>
				</span>Publish For Soft Launch
			</button>

      	</div>
    </div>
  </div>
</div>
@endsection
@section('frontFooterSection')
@endsection
