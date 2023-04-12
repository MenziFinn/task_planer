function abbreviateNumber(value) {
    var newValue = value;
    if (value >= 1000) {
        var suffixes = ["", "К", "М", "ММ", "t"];
        var suffixNum = Math.floor(("" + value).length / 3);
        var shortValue = '';
        for (var precision = 2; precision >= 1; precision--) {
            shortValue = parseFloat((suffixNum != 0 ? (value / Math.pow(1000, suffixNum)) : value).toPrecision(precision));
            var dotLessShortValue = (shortValue + '').replace(/[^a-zA-Z 0-9]+/g, '');
            if (dotLessShortValue.length <= 2) {
                break;
            }
        }
        if (shortValue % 1 != 0) shortNum = shortValue.toFixed(1);
        newValue = shortValue + suffixes[suffixNum];
    }
    return newValue;
}

$(".pie").each(function (item) {
    var data = JSON.parse($(this).attr("data"));
    $(this).append("<canvas id=\"context\"></canvas>");
    var canvas = $("#context", this);
    canvas.attr({
        width: 215,
        height: 165 + data.items.length * 25
    });
    var ctx = canvas[0].getContext("2d");
    var fullArc = (2 * Math.PI) / data.total;
    var filledArc = 11;
    ctx.lineWidth = 20;
    ctx.font = "14px Roboto";
    data.items.forEach(function (item, index) {
        ctx.beginPath();
        ctx.strokeStyle = item.color;
        ctx.arc(100, 75, 50, filledArc, filledArc + item.value * fullArc);
        filledArc += item.value * fullArc
        ctx.stroke();
        ctx.beginPath();
        ctx.rect(10, 150 + 25 * index, 20, 20);
        ctx.fillStyle = item.color;
        ctx.fill();
        ctx.fillStyle = "black";
        ctx.fillText(item.name + ": " + abbreviateNumber(item.value) + " " + data.currency, 40, 165 + 25 * index);
    });
})