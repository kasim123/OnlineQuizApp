package com.opportunity.quiz;

import android.os.Bundle;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class MainActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        
        final EditText txtName = (EditText) findViewById(R.id.txtName);
		final EditText txtEmail = (EditText) findViewById(R.id.txtEmail);
		final EditText txtPhone = (EditText) findViewById(R.id.txtPhone);
		final EditText txtRefno = (EditText) findViewById(R.id.txtRefNo);

		Button btnProceed = (Button) findViewById(R.id.btnProceed);

		btnProceed.setOnClickListener(new View.OnClickListener() {
			public void onClick(View v) {
				// Perform action on click

				AlertDialog alertDialog = new AlertDialog.Builder(MainActivity.this).create();
				String str = txtName.getText().toString();

				if (txtName.getText() == null || str.trim().length() == 0) {
					alertDialog.setTitle("Validation Error");
					alertDialog.setButton(DialogInterface.BUTTON_POSITIVE,"OK", new DialogInterface.OnClickListener() {
						
						@Override
						public void onClick(final DialogInterface dialog, final int which) {
							// TODO Auto-generated method stub							
						}
					});
					
					alertDialog.setMessage("Name Field Cannot be Empty!");
					alertDialog.show();
				} else {

					Intent nextActivity = new Intent(getApplicationContext(),	VideosList.class);
					startActivityForResult(nextActivity, 0);
				}

			}
		});
		
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
}
