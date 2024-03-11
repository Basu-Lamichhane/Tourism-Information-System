<style>
    .submit-button {
        line-height: 36px;
        height: 37px;
        text-decoration: none;
        display: inline-flex;
        color: #ffffff;
        background-color: #FF813F;
        border-radius: 3px;
        border: 1px solid transparent;
        padding: 1px 9px;
        font-size: 16px;
        letter-spacing: 0.6px;
        margin-left: 100px;
        transition: 0.3s all linear;
        cursor: pointer;
    }

    .submit-button:hover,
    .submit-button:active,
    .submit-button:focus {
        -webkit-box-shadow: 0px 1px 2px 2px rgba(190, 190, 190, 0.5);
        text-decoration: none;
        box-shadow: 0px 1px 2px 2px rgba(190, 190, 190, 0.5);
        opacity: 0.85;
        color: #ffffff;
    }

    input#amount {
        margin-left: 93px;
        padding: 5px;
        margin-bottom: 10px;
        border: 2px solid orange;
        border-radius: 5px;
    }
</style>

<form action="user/include/esewaintegration.inc.php" method="POST" class="bmc-button" id="form">
    <input type="number" id="amount" name="amount" value="120" required>
    <input value="Buy me a coffee" type="submit" name="submit-amount" class="submit-button">
</form>