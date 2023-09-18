<?php
    //Column
    const _REGISTER = "註冊新帳號";
    const _LOGIN = "使用者登入";
    const _USERNAME = "輸入使用者名稱";
    const _EMAIL = "輸入電子信箱";
    const _PASSWORD = "密碼";
    const _INSTRUC = "點此了解會員專屬功能";
    const _DESCRIB = "
        註冊後，使用者可以透過讚或踩文章、查看自己的評論，以及發表自己的文章來跟不同社群互動，
        可以擁有更完整的使用體驗。
    ";
    const _CREATE_ACC = "還沒有註冊嗎？";
    const _FORGOT_PASS = "忘記密碼";
    const _CATER_WELL = "文章分類";
    const _SEARCH_WELL = "搜尋";
    const _SEARCH_COL = "關鍵字 / 作者 / 類別 ......";
    const _CAMPAIGN_WELL = "相關活動";
    const _ABOUT_WELL = "關於我們";
    const _REGIST_NAV = "註冊";
    const _CONTACT_NAV = "聯絡我們";
    const _LOGOUT_NAV = "登出";
    const _ADMIN_NAV = "管理中心";
    const _USER_NAV = "使用者中心";
    const _VIEW_POST = "次瀏覽";
    const _DATE_POST = "發布時間";
    const _AUTHOR_POST = "作者";
    const _FEEL_COMMENT = "發表你的心情";
    const _LOGIN_LIKE_MSG = "請先登入才能使用本功能";
    const _COMMENT_WELL = "留下你的評論";
    const _COMMENT_CONTENT = "內容";
    const _COMMENT_MAIL = "電子郵件";
    const _COMMENT_MORE = "更多留言";
    const _RESPONSE_WELL = "留言";
    const _COMMENT_NUM = "則留言";
    const _CATE_RESULT = "篇文章在類別";
    const _COMMENT_ID_MSG = "使用已登入的用戶名稱";
    const _POST_NUM = "篇文章 作者為";
    const _LIKE_WELL = "你按讚的文章";
    const _WELCOME_WELL = "歡迎回来";
    const _LOGOUT_WELL = "登出並註冊新帳號"; 
    const _ONLINE_WINDOW = "線上人數";
    const _SOCIAL_WINDOW = "歡迎訂閱電子報 掌握最新消息<br>追蹤我們的粉專";
    const _SOCIAL_BTN = "目前不需要";   
    const _SEARCH_RESULT = "個結果 關於";
    const _NO_SEARCH = "未搜尋到相關結果";
    const _LANG_WELL = "語言";
    const _USER_ADMIN = "使用者設定中心";
    const _USER_POST = "文章";
    const _USER_DETAIL = "檢視";
    const _USER_COMM = "留言";
    const _ACT_POST =  "已發佈的文章";
    const _DFT_POST =  "文章草稿";
    const _APPROV_COMM =  "已審核留言";
    const _UNAPPROV_COMM =  "未審核留言";
    const _USER_OVERVIEW = "使用者資訊總覽";
    const _USER_CHART = "文章、使用者、留言數量";
    const _CHART_COUNT = "數量";
    const _CHART_NAV = "圖表概覽";
    const _VIEW_POSTS = "查看所有文章";
    const _ADD_POST = "發表新文章";
    const _HISTORY = "按讚紀錄";
    const _USER_POST_COMM = "我的文章留言";
    const _PROFILE = "個人檔案";
    const _LIKE_POSTS = "喜歡與不喜歡的文章";
    const _USER_SELF_COMM = "我的留言";
    const _SETTING = "設定";
    const _REPORT = "檢舉 (測試中 尚未開放)";
    const _APPLY = "送出";
    const _ID = "編號";
    const _COMM_CONTENT = "留言內容";
    const _POST_TITLE = "文章標題";
    const _STATUS = "審核狀態";
    const _DATE = "發布日期";
    const _DEL = "刪除";
    const _IMG = "圖片";
    const _TAG = "標籤";
    const _VIEW = "瀏覽次數";
    const _COMM_COUNT = "留言數";
    const _ALL_HISTORY = "全部文章";
    const _FROM_POST = "你的文章";
    const _SELECT_POST = "選擇一篇文章";
    const _NO_COMM = "此文章目前沒有留言";
    const _CREATE_POST = "新增";
    const _EDIT_POST = "編輯";
    const _ALL_POST = "全部";
    const _STATUS_DFT = "草稿";
    const _STATUS_PUB = "公開";
    const _STATUS_SPM = "非公開";
    const _POST_CONTENT = "文章內容";
    const _ADD_TAG = "新增標籤";
    const _SORT_WAY = "排序方式";
    const _ASC = "遞增";
    const _DEC = "遞减";
    const _SORT = "排序";
    const _USER = "使用者";
    const _FIRST_N  = "名字";
    const _LAST_N  = "姓氏";
    const _ROLE = "使用權限";
    const _SUBSCRIBER = "一般使用者";
    const _ADMIN = "管理者";
    const _UN = "使用者名稱";
    const _SAVE = "儲存";
    const _CONTACT = "聯絡我們";
    const _SUBJECT = "主旨";
    const _MSG = "訊息內容";
    const _CONTACT_REPLY = "我們會回覆到此信箱";
    const _CONTACT_PROBLEM = "描述你的問題";
    const _BANNER_DES = "訂閱我們的電子報 & 啟發更多學習的方法";
    const _SUBSCR = "前往訂閱";
    const _REGIST_BANNER ="
        與志同道合的人分享你的程式知識，<br>
        與社群一起合作並共同參與專案。<br>
        立即加入，開始與其他熱愛程式設計的人一同學習、教學和成長。<br>
        讓我們攜手合作，創造出卓越的成果吧！
    ";
    const _INTRO = "
        <p><b>歡迎來到 Cocoding！</b></p>
        <p>
            我們是由 Tatiana Chang 創立的專業平台，致力於提供全面的程式語言教學和資源給有志成為開發者和熱愛編程的人士。<br>
            我們的使命在於簡化學習程式語言的過程，提供精心製作的文章、教學和指南，<br>
        </p>
        <p>
            涵蓋 Python、JavaScript、Java、C++ 等多種程式語言。<br>
            加入我們充滿活力的社群，與其他編程愛好者連結，獲得豐富的知識。<br>
        </p>
        <p>
            <b>
                開始探索 Cocoding，解鎖您的編程潛力吧！
            </b>
        </p>
        
    ";
    const _FOOTER_INTRO = "
        此網頁是由Wen-ting Chang 開發的專案<br>
        <p>所有引用的資料僅供教育和參考之用，不涉及商業目的。</p>
        <p>
            請大家遵守相關的版權法律，尊重智慧財產權，<br>
            共同營造一個良好的學習環境。
        </p>
        如有需求或是任何指教，請由右側聯絡資訊聯繫。      
    ";
    const _PRODUCTS = "相關產品";
    const _MOBILE = "手機應用程式 <br>(開發中)";
    const _DESKTOP = "桌上型電腦應用程式 <br>(開發中)";
    const _PUBLISH = "其他出版品 <br>(開發中)";
    const _LINKS = "連結";
    const _PRICING = "詢價";
    const _ORDER = "合作訂單";
    const _HELP = "幫助";
    const _ADDR = "台中科技大學資訊工程系 2502研究室";
    const _CAMP_DES = "
        <p>持續關注我們最新的活動、挑戰和程式比賽，<br>您可以展示自己的技能、向其他程式愛好者學習，有機會贏得獎品。</p>
        <p>加入我們一起探索程式的世界，<br>透過我們共同的努力產生積極的影響。</p>
        <p>密切留意此處即將舉行的活動，<br>準備展現自己的實力吧！</p>
    ";
    const _LIKE_COUNT="個讚";
    const _DISLIKE_COUNT="個倒讚";

    //Button
    const _CHECK_BTN = "檢查";
    const _RESET_BTN = "重設";
    const _SUBMIT_BTN = "送出";
    const _LIKE_BTN = "讚";
    const _DISLIKE_BTN = "不喜歡";
    const _READ_POST_BTN = "繼續閱讀";
    const _HOME_BTN = "首頁";
    const _SORT_BY_BTN = "排序依照";


    //Message
    const _NO_USR_MSG = "請輸入使用者名稱";
    const _SHORT_USR_MSG = "使用者名稱長度需大於六個字元";
    const _REPEAT_USR_MSG = "此使用者名稱已經存在";
    const _VALID_USR_MSG = "此為有效的使用者名稱";
    const _CHECK_USR_MSG = "使用者名稱未通過檢查";
    const _USED_MAIL_MSG = "錯誤，該電子郵件已被使用";
    const _LOGIN_MSG = "使用您的帳戶登入";
    const _EMPTY_COL_MSG = "錯誤，該欄位不能為空";
    const _CONGRAT_MSG = "恭喜！您現在成為我們的訂閱用戶。";
    const _LOGIN_TIME_MSG = "登入時間";
?>