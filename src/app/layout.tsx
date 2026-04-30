import type { Metadata, Viewport } from "next";
import { Poppins } from "next/font/google";
import "./globals.css";
import { Navbar } from "@/components/Navbar";
import { Footer } from "@/components/Footer";
import { WhatsAppFloat } from "@/components/WhatsAppFloat";
import { SITE } from "@/lib/site";

const poppins = Poppins({
  variable: "--font-poppins",
  weight: ["300", "400", "500", "600", "700", "800"],
  subsets: ["latin"],
  display: "swap",
});

export const metadata: Metadata = {
  metadataBase: new URL(SITE.url),
  title: {
    default: `${SITE.name} | Solar Power Solutions in Tirupati`,
    template: `%s | ${SITE.name}`,
  },
  description:
    "Pragathi Power Solutions is the leading solar power company in Tirupati and Authorised TATA Power Solar Partner in Rayalaseema. Rooftop solar, water heaters, street lights, pumpsets and AMC.",
  keywords: [
    "solar power Tirupati",
    "TATA Power Solar partner Rayalaseema",
    "rooftop solar Andhra Pradesh",
    "solar panel installation Tirupati",
    "PM Surya Ghar Muft Bijli Yojana",
    "solar water heater",
    "solar street lights",
    "solar pumpset PM-KUSUM",
    "Pragathi Power Solutions",
  ],
  authors: [{ name: SITE.name }],
  openGraph: {
    type: "website",
    locale: "en_IN",
    url: SITE.url,
    siteName: SITE.name,
    title: `${SITE.name} | Solar Power Solutions in Tirupati`,
    description:
      "Authorised TATA Power Solar Partner in Rayalaseema. End-to-end solar solutions since 2012.",
  },
  twitter: {
    card: "summary_large_image",
    title: `${SITE.name} | Solar Power Solutions in Tirupati`,
    description:
      "Authorised TATA Power Solar Partner in Rayalaseema. End-to-end solar solutions since 2012.",
  },
  robots: { index: true, follow: true },
};

export const viewport: Viewport = {
  themeColor: "#1f3a93",
  width: "device-width",
  initialScale: 1,
};

export default function RootLayout({
  children,
}: Readonly<{ children: React.ReactNode }>) {
  return (
    <html lang="en" className={`${poppins.variable} h-full antialiased scroll-smooth`}>
      <body className="min-h-full flex flex-col bg-background text-foreground">
        <Navbar />
        <main className="flex-1">{children}</main>
        <Footer />
        <WhatsAppFloat />
      </body>
    </html>
  );
}
