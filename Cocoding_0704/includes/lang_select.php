<form method= "get" class="navbar-form navbar-right" id = "langForm">
    <div class="form-group">
        <select name="lang" class = "form-control" id = "langOption">
            <option value="en" <?php if($_SESSION['lang']=="en"){echo "selected";}?> disabled>
                Language Setting
            </option>
            <option value="en" <?php if($_SESSION['lang']=="en"){echo "selected";}?> >
                English (Default)
            </option>
            <option value="zh_tw" <?php if($_SESSION['lang']=="zh_tw"){echo "selected";}?>>
                Traditional Chinese (繁體中文)
            </option>
            <option value="zh_cn" <?php if($_SESSION['lang']=="zh_cn"){echo "selected";}?>>
                Simplified Chinese (简体中文)
            </option>
        </select>
    </div>
</form>