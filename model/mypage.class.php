<?php

	class Mypage{

		var $pageSize;	//一页显示多少条信息
		var $showpage;	//导航条显示多少条
		var $total;		//一共多少条信息---数据库获取
		var $pageoffset;	//偏移量---计算
		var $total_pages;	//总共多少页显示
		var $page;	//	当前页
		var $goToURL;	//跳转

		function __construct($page, $pageSize, $showpage, $total){
			$this->page = $page;
			$this->pageSize = $pageSize;
			$this->showpage = $showpage;
			$this->total = $total;

			/***计算偏移量和总页数***/
			$this->pageoffset = floor(($this->showpage-1)/2);
			$this->total_pages = ceil($total/$pageSize);
		}


		//导航条
		function navigationBar(){
			if ($this->showpage%2 == 0) {
				$content = $this->pageEven($this->goToURL);
			}else{
				$content = $this->pageOdd($this->goToURL);
			}
			return $content;
		}
		/*
		**
		*	分页---奇数
		*/
		function pageOdd(){
			$page_banner = "";
			//默认开始显示
			$start=1;
			//默认结尾显示
			$end = $this->total_pages;
			/* 当前页大于第一页显示*/
			if ($this->page > 1) {
				$page_banner .= "<a href = ".$this->goToURL."?page=1>首页</a>";
				$page_banner .= "<a href = ".$this->goToURL."?page=".($this->page-1).">上一页</a>";
			}else{
				$page_banner .= "<span>首页</span>";
				$page_banner .= "<span>上一页</span>";
			}
			/*省略号--总页数大于要显示的页数*/
			if ($this->total_pages > $this->showpage) {
				/* 当前页数大于偏移量+1才有前面省略号*/
				if ($this->page > $this->pageoffset+1) {
					$page_banner .= "...";
				}
				/*当前页数大于偏移量---*/
				if ($this->page > $this->pageoffset) {
					$start = $this->page - $this->pageoffset;
					/* 总页数与当前页+偏移量比较*/
					$end = $this->total_pages>$this->page+$this->pageoffset?$this->page+$this->pageoffset:$this->total_pages;
				}else{
					$start=1;
					/* 总页数与要显示的页数比较*/
					$end =$this->showpage;
				}
				if ($this->page+$this->pageoffset>$this->total_pages) {
					$start = $start - ($this->page+$this->pageoffset-$end);
				}
			}

			for ($i = $start; $i <= $end; $i++){
				if ($this->page == $i) {	
					$page_banner .= "<span>{$i}</span>";	//选中页数时的显示
				}else{
					$page_banner .= "<a href = ".$this->goToURL."?page=".$i.">$i</a>";	//没有选中时显示
				}
			}

			//尾部省略
			if ($this->total_pages > $this->showpage && $this->total_pages > $this->page+$this->pageoffset) {
				$page_banner .= "...";
			}
			if ($this->page < $this->total_pages) {
				$page_banner .= "<a href = ".$this->goToURL."?page=".($this->page+1).">下一页</a>";
				$page_banner .= "<a href = ".$this->goToURL."?page=".($this->total_pages).">尾页</a>";	
			}else{
				$page_banner .= "<span>尾页</span>";
				$page_banner .= "<span>下一页</span>";
			}

			$page_banner .= "&nbsp;共有".$this->total_pages."页，";
			$page_banner .= "&nbsp;本页为第".$this->page."页，";
			$page_banner .= "<form action = ".$this->goToURL." method = 'get'>";
			$page_banner .= "到第<input type='text' size = '2' name='page'/>页";
			$page_banner .= "<input type='submit' value='跳转'/>";
			$page_banner .= "</form>";
			return $page_banner;
		}
		/*
		 *
		 * 分页---偶数
		 *
		 *
		 */
		function pageEven(){
			$page_banner = "";
			//默认开始显示
			$start = 1;
			//默认结尾显示
			$end = $this->total_pages;
			/* 当前页大于第一页显示*/
			if ($this->page > 1) {
				$page_banner .= "<a href = ".$this->goToURL."?page=1>首页</a>";
				$page_banner .= "<a href = ".$this->goToURL."?page=".($this->page-1).">上一页</a>";
			}else{
				$page_banner .= "<span>首页</span>";
				$page_banner .= "<span>上一页</span>";
			}
			/*省略号--总页数大于要显示的页数*/
			if ($this->total_pages > $this->showpage) {
				/* 当前页数大于偏移量+1才有前面省略号*/
				if ($this->page > $this->pageoffset+1) {
					$page_banner .= "...";
				}
				/*当前页数大于偏移量---*/
				if ($this->page > $this->pageoffset) {
					$start = $this->page - $this->pageoffset;
					/* 总页数与当前页+偏移量比较*/
					$end = $this->total_pages>$this->page+$this->pageoffset+1?$this->page+$this->pageoffset+1:$this->total_pages;
				}else{
					$start=1;
					/* 总页数与要显示的页数比较*/
					$end =$this->showpage;
				}
				if ($this->page+$this->pageoffset>=$this->total_pages) {
					$end = $this->total_pages;
					$start = $start - ($this->page+$this->pageoffset-$end);
				}
			}

			for ($i = $start; $i <= $end; $i++){
				if ($this->page == $i) {	
					$page_banner .= "<span>{$i}</span>";	//选中页数时的显示
				}else{
					$page_banner .= "<a href = ".$this->goToURL."?page=".$i.">$i</a>";	//没有选中时显示
				}
			}

			//尾部省略
			if ($this->total_pages > $this->showpage && $this->total_pages > $this->page+$this->pageoffset+1) {
				$page_banner .= "...";
			}
			if ($this->page < $this->total_pages) {
				$page_banner .= "<a href = ".$this->goToURL."?page=".($this->page+1).">下一页</a>";
				$page_banner .= "<a href = ".$this->goToURL."?page=".($this->total_pages).">尾页</a>";	
			}else{
				$page_banner .= "<span>尾页</span>";
				$page_banner .= "<span>下一页</span>";
			}

			$page_banner .= "&nbsp;共有".$this->total_pages."页，";
			$page_banner .= "&nbsp;本页为第".$this->page."页，";
			$page_banner .= "<form action = ".$this->goToURL." method = 'get'>";
			$page_banner .= "到第<input type='text' size = '2' name='page'/>页";
			$page_banner .= "<input type='submit' value='跳转'/>";
			$page_banner .= "</form>";
			return $page_banner;
		}
	}
?>