import { SITE } from "@/lib/site";
import { WhatsAppIcon } from "./Icons";

export function WhatsAppFloat() {
  return (
    <a
      href={SITE.whatsapp}
      target="_blank"
      rel="noopener noreferrer"
      aria-label="Chat on WhatsApp"
      className="fixed bottom-6 right-6 z-40 inline-flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-2xl hover:scale-110 transition-transform animate-sun-pulse"
      style={{
        boxShadow: "0 10px 30px -5px rgba(37, 211, 102, 0.6)",
      }}
    >
      <WhatsAppIcon size={28} />
      <span className="sr-only">Chat with us on WhatsApp</span>
    </a>
  );
}
