<!-- search_systems.tpl -->
{display_box_top title="Search Systems"}

<script language="JavaScript">
{literal}

decode_table = new Array();
decode_table[0] = new Array();
decode_table[1] = new Array();
decode_table[2] = new Array();


decode_table[1]["C3"] = 0;
decode_table[1]["CN"] = 1;
decode_table[1]["Cx"] = 2;
decode_table[1]["Ch"] = 3;
decode_table[1]["D3"] = 4;
decode_table[1]["DN"] = 5;
decode_table[1]["Dx"] = 6;
decode_table[1]["Dh"] = 7;
decode_table[1]["E3"] = 8;
decode_table[1]["EN"] = 9;

decode_table[2]["n"] = 0;
decode_table[2]["j"] = 1;
decode_table[2]["f"] = 2;
decode_table[2]["b"] = 3;
decode_table[2]["D"] = 4;
decode_table[2]["z"] = 5;
decode_table[2]["v"] = 6;
decode_table[2]["r"] = 7;
decode_table[2]["T"] = 8;
decode_table[2]["P"] = 9;

decode_table[0]["Z"] = 0;
decode_table[0]["Y"] = 1;
decode_table[0]["X"] = 2;
decode_table[0]["W"] = 3;
decode_table[0]["3"] = 4;
decode_table[0]["2"] = 5;
decode_table[0]["1"] = 6;
decode_table[0]["0"] = 7;
decode_table[0]["7"] = 8;
decode_table[0]["6"] = 9;


function translate( raw )
{
        var sections = new Array();
        sections = raw.split(".");
        
        if ( validateBarcode( translateCueCatInput( sections[3] ) ) )
                document.forms[0].checkdigit.value = "Valid";
        else
                document.forms[0].checkdigit.value = "Invalid";
        
        document.forms[0].translated.value = translateCueCatInput( raw );
        document.forms[0].numberonly.value = translateCueCatInput( sections[3] );
        document.forms[0].tokenized.value = tokenizeCueCatInput( raw );
}

// takes a standard 12-digit barcode and makes sure it matches the check digit

function validateBarcode( barcode )
{
        barcode = barcode.toString();

        oddSum = parseInt(barcode.charAt(0)) + parseInt(barcode.charAt(2)) + parseInt(barcode.charAt(4)) + parseInt(barcode.charAt(6)) + parseInt(barcode.charAt(8)) + parseInt(barcode.charAt(10));
        evenSum = parseInt(barcode.charAt(1)) + parseInt(barcode.charAt(3)) + parseInt(barcode.charAt(5)) + parseInt(barcode.charAt(7)) + parseInt(barcode.charAt(9));
        
        n = (oddSum * 3) + evenSum;
        x = n % 10;
        if ( x == 0 )
                x = 10;

        checkDigit = 10 - x;
                
        if ( parseInt(barcode.charAt(11)) != checkDigit )
                return false;
        else
                return true;
}

function translateCueCatInput( raw )
{
        var output = "";
        var charcount = 0;
        var clean = "";

        for( n=0; n<raw.length; n++ )
        {
                if( raw.charAt(n) != "." )
                        clean += raw.charAt(n).toString();
        }
        
        for( i=0; i<clean.length; i++ )
        {
                if( decode_table[(charcount+1)%3][clean.charAt(i).toString()] != undefined  )
                {
                        output += decode_table[(charcount+1)%3][clean.charAt(i).toString()];
                        charcount++;
                }
                else if( decode_table[(charcount+1)%3][clean.charAt(i).toString() + clean.charAt(i+1).toString()] != undefined )
                {
                        output += decode_table[(charcount+1)%3][clean.charAt(i).toString() + clean.charAt(i+1).toString()];
                        charcount++;
                        i++;
                }

                
        }
        return( output );
}

// This function is not necessary for the translation, but it lets
// you see how the :CueCat output is broken up for translation.

function tokenizeCueCatInput( raw )
{
        var charcount = 0;
        var clean = "";
        var base = "";

        for( n=0; n<raw.length; n++ )
        {
                if( raw.charAt(n) != "." )
                        clean += raw.charAt(n).toString();
        }
        
        for( i=0; i<clean.length; i++ )
        {
                if( decode_table[(charcount+1)%3][clean.charAt(i).toString()] != undefined  )
                {
                        base += " " + clean.charAt(i).toString();
                        charcount++;
                }
                else if( decode_table[(charcount+1)%3][clean.charAt(i).toString() + clean.charAt(i+1).toString()] != undefined )
                {
                        base += " " + clean.charAt(i).toString() + clean.charAt(i+1).toString();
                        charcount++;
                        i++;
                }               
        }
        return( base );
}
        
                
                


{/literal}

</script>

<body onLoad="document.forms[0].upcCode.focus();">

<form method="POST" action="{$ROOT_URL}/index.php?page=system:admin_search_systems">
	<table cellpadding="3" cellspacing="0" class="formArea">
		<tr>
			<td class="small">UPC</td>
			<td class="small"><input type="text" name="upcCode" id="upcCode" value="{$upcCode}"></td>
		</tr><tr>	
			<td colspan="2" class="small"><input type="submit" name="submit" value="Search"></td>
	</tr>
	</table>
	
</form>
{display_box_bottom}