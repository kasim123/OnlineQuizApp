package com.opportunity.quiz;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;

import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONException;
import org.json.JSONObject;

import com.opportunity.quiz.R.id;

import android.os.Bundle;
import android.app.Activity;
import android.app.backup.SharedPreferencesBackupHelper;
import android.content.SharedPreferences;
import android.view.Menu;
import android.widget.VideoView;

public class ShowVideo extends Activity {

	public static final String PREFS_NAME = "MyPrefsFile";

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_show_video);

		SharedPreferences settings = getSharedPreferences(PREFS_NAME, 0);

		HttpClient httpclient = new DefaultHttpClient();
		HttpPost httppost = new HttpPost(
				"http://10.0.2.15/AndroidServices/GetVideo.php?id="
						+ settings.getString("VideoID", "VID001"));

		VideoView video = (VideoView) findViewById(id.videoView1);

		try {

			HttpResponse response = httpclient.execute(httppost);
			String jsonResult = inputStreamToString(
					response.getEntity().getContent()).toString();
			JSONObject object = new JSONObject(jsonResult);

			String name = object.getString("video");
			String verion = object.getString("version");
			// textView.setText(name + " - " + verion);

		} catch (JSONException e) {
			e.printStackTrace();
		} catch (ClientProtocolException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}

	}

	private StringBuilder inputStreamToString(InputStream is) {
		String rLine = "";
		StringBuilder answer = new StringBuilder();
		BufferedReader rd = new BufferedReader(new InputStreamReader(is));

		try {
			while ((rLine = rd.readLine()) != null) {
				answer.append(rLine);
			}
		}

		catch (IOException e) {
			e.printStackTrace();
		}
		return answer;
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.show_video, menu);
		return true;
	}

}
