function confdel(item) {
	// Je nach System müssen Umlaute maskiert werden oder nicht
//    answer=confirm(unescape("M%F6chten Sie " + item + " wirklich l%F6schen?"));
    answer=confirm("Möchten Sie " + item + " wirklich löschen?");
    return answer;
}