package com.atom.wavechat

import android.os.Bundle
import android.webkit.WebView
import android.webkit.WebViewClient
import androidx.appcompat.app.AppCompatActivity

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        webViewSetup()
    }

    private fun webViewSetup() {
        val wb_webView: WebView = findViewById(R.id.wb_webView)

        wb_webView.webViewClient = WebViewClient()

        wb_webView.settings.javaScriptEnabled = true

        wb_webView.settings.allowFileAccess = true

        wb_webView.settings.safeBrowsingEnabled = false

        wb_webView.loadUrl("http://192.168.1.7/")
    }
}
